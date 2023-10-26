<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{

    public function index(){
        $services    = Testimonial::where('type','testimonial')->get();
        return view('admin.testimonials.list',get_defined_vars());
      }
    
    
      public function store(Request $request)
      {
          $feature = null;
      
          // Validation rules
          $rules = [
            'name' => 'required',
            'description' => 'required',
          ];
      
          // If it's an edit, remove the 'image' validation rule
          if ($request->id) {
              unset($rules['image']);
              $feature = Testimonial::find($request->id);
          } else {
              $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
              $feature = new Testimonial;
          }
      
          // Validate the request data
          $validator = \Validator::make($request->all(), $rules);
          if ($validator->fails()) {
              return response()->json([
                  'status' => false,
                  'message' => $validator->errors()
              ]); // Use the HTTP status code 422 (Unprocessable Entity)
          }
      
          $feature->name = $request->name;
          $feature->type = 'testimonial';
          $feature->description = $request->description;
      
          // Handle the image if a new image is provided
          if ($request->hasFile('image')) {
              $image = $request->file('image');
              $imageName = time() . '.' . $image->getClientOriginalExtension();
              $imagePath = public_path('admin-asset/images/testimonial_images');
      
              // Create the directory if it doesn't exist
              if (!file_exists($imagePath)) {
                  mkdir($imagePath, 0755, true);
              }
      
              // Delete the previous image if it exists
              if ($feature->image && file_exists($imagePath . '/' . $feature->image)) {
                  unlink($imagePath . '/' . $feature->image);
              }
      
              $image->move($imagePath, $imageName);
              $feature->image = $imageName;
          }
      
          $feature->save();
          if($request->id){
              return response()->json(['status' => true, 'message' => 'Testimonial Updated successfully!']);
          }
          return response()->json(['status' => true, 'message' => 'Testimonial Created successfully!']);
      }
      
    
      public function delete(Request $request)
      {
          $service = Testimonial::find($request->id);
          if (!$service) {
              // Handle the case where the category is not found
              return redirect()->back()->with('error', 'Service not found.');
          }
      
          // Delete the associated image file
          if ($service->image) {
              $imagePath = public_path('admin-asset/images/testimonial_images/' . $service->image);
              if (file_exists($imagePath)) {
                  unlink($imagePath); // Delete the image file
              }
          }
      
          $service->delete();
      
          // Set a success message in the session
          Session::flash('success', 'Testimonial deleted successfully');
      
          return redirect()->back(); // Redirect back to the previous page
      }
    
    
      public function edit(Request $request){
         $services = Testimonial::find($request->id);
         return $services;
      }
}