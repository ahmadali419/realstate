<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class PropertyController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role->name === 'Admin') {
            $properties = Property::with('category')->latest()->get();
        }else{
            $properties = Property::with('category')->where('user_id',Auth::user()->id)->latest()->get();
        }
        $features = Feature::all();
        return view('admin.properties.list', get_defined_vars());
    }


    public function create()
    {
        $categories = Category::all();
        $featureIds = [];
        return view('admin.properties.create', get_defined_vars());
    }


    public function getFurnishingList()
    {
        $features = Feature::all(['name', 'id'])->toArray();
        return $features;
    }

    public function edit(Request $request){
        $property = Property::where('id', $request->id)
        ->with(['category', 'propertyFeatures', 'propertyImages'])
        ->first();
        $featureIds = $property->propertyFeatures->pluck('feature_id')->all();
        $categories = Category::all();
        return view('admin.properties.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        // print_r($request->all());exit;
        DB::beginTransaction();
      
        $rules = [
            'title' => 'required|string',
            'category_id' => 'required|integer',
            'purpose' => 'required|in:Rent,Sale', // Adjust values as needed
            'zip_code' => 'required|string|regex:/^\d{5}$/',
            'country' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'furnished_status' => 'required|in:Furnished,Unfurnished', // Adjust values as needed
            'parking_lots' => 'required|integer',
            'rental_period' => 'required|string',
            'features' => 'required',
            'Description' => 'required',
            'user_id'=>Auth::user()->id,
            // 'plFurnishingDetails.*.label' => 'required|integer',
            'nearby' => 'required',
            'area_sqf' => 'required|integer',
            'area_sqm' => 'required|integer',
            'price_sqf' => 'required|numeric',
            'price_sqm' => 'required|numeric',
        ];
        if (!$request->id) {
            $rules = array_merge($rules, [
                'image' => 'required', // Image validation rules
                'property_images' => 'required|array',
                'property_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Replace with your desired validation rules
            ]);
        }
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]); // Use the HTTP status code 422 (Unprocessable Entity)
        }
        $features = json_decode($request->features);
        $features = array_column($features, 'label');
        $title = $request->input('title');
        $slug = Str::slug($title);
        // Create a new property
        $description = 'asdf';
        try {
            $property = Property::updateOrCreate(['id'=>$request->id],[
                'title' => $request->input('title'),
                'slug' => $slug,
                'description' => $request->Description,
                'category_id' => $request->input('category_id'),
                'type' => $request->input('purpose'),
                'zip_code' => $request->input('zip_code'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'bedroom' => $request->input('bedrooms'),
                'bathroom' => $request->input('bathrooms'),
                'furnished_status' => $request->input('furnished_status'),
                'parking_lots' => $request->input('parking_lots'),
                'rental_period' => $request->input('rental_period'),
                'area_sqf' => $request->input('area_sqf'),
                'area_sqm' => $request->input('area_sqm'),
                'price_sqf' => $request->input('price_sqf'),
                'price_sqm' => $request->input('price_sqm'),
                'near_by' => $request->nearby,
            ]);
            if(!$request->id){
                $ref_no  = str_pad($property->id, 4, '0', STR_PAD_LEFT);
                $property->ref_no = $ref_no;
            }
            // Handle the image if a new image is provided
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('admin-asset/images/product_images');

                // Create the directory if it doesn't exist
                if (!file_exists($imagePath)) {
                    mkdir($imagePath, 0755, true);
                }

                // Delete the previous image if it exists
                if ($property->image && file_exists($imagePath . '/' . $property->image)) {
                    unlink($imagePath . '/' . $property->image);
                }

                $image->move($imagePath, $imageName);
                $property->image = $imageName;
                $property->save();
            }


            $images = $request->file('property_images');
            $imagePaths = [];
            if($images){
                foreach ($images as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $imagePath = public_path('admin-asset/images/product_images');
    
                    if (!file_exists($imagePath)) {
                        mkdir($imagePath, 0755, true);
                    }
    
                    $image->move($imagePath, $imageName);
                    $imagePaths[] = $imageName;
                }
                $property->images()->attach($imagePaths);
            }
            $property->features()->sync($features);

            DB::commit();
            if($request->id){
                return response()->json(['status' => true, 'message' => 'Property Updated succssfully!']);
            }
            return response()->json(['status' => true, 'message' => 'Property Created succssfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false, 'message' => $e->getMessage(),
                // 'line' => $e->getLine(),
                //  'file' => $e->getFile()
            ]);
        }
    }


    public function delete(Request $request){
        $property = Property::find($request->id);
        if (!$property) {
            // Handle the case where the category is not found
            return redirect()->back()->with('error', 'property not found.');
        }
    
        // Delete the associated image file
        if ($property->image) {
            $imagePath = public_path('admin-asset/images/product_images/' . $property->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
        }
    
        $property->delete();
    
        // Set a success message in the session
        Session::flash('success', 'property deleted successfully');
    
        return redirect()->back(); // Redirect back to the previous page
    }


    public function uploadImage(Request $request){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('admin-asset/images/product_images');

            // Create the directory if it doesn't exist
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0755, true);
            }

          

            $image->move($imagePath, $imageName);
            return $image;
        }
    }


    public function removeImage(Request $request){
        if ($request->name) {
           

            $images = PropertyImage::where(['property_id'=>$request->property_id])->get();
            if (count($images) < 2) {
                return redirect()->back()->with('error','You cannot delete all images!');
            }
            $imagePath = public_path('admin-asset/images/product_images/' . $request->name);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
        
            PropertyImage::where(['id'=>$request->id,'property_id'=>$request->property_id])->delete();
            return redirect()->back()->with('success','Image deleted successfully!');

        }


    
    }
}
