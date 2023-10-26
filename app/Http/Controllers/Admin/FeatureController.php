<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller
{
  public function index(){
    if (auth()->check() && auth()->user()->role->name === 'Admin') {
        $categories = Feature::all();
    }else{
        $categories = Feature::where('added_by',Auth::user()->id)->get();
    }

    return view('admin.features.list',get_defined_vars());
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
          $feature = Feature::find($request->id);
      } else {
          $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
          $feature = new Feature;
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
      $feature->description = $request->description;
      $feature->added_by = Auth::user()->id;
  
      // Handle the image if a new image is provided
      if ($request->hasFile('image')) {
          $image = $request->file('image');
          $imageName = time() . '.' . $image->getClientOriginalExtension();
          $imagePath = public_path('admin-asset/images/feature_images');
  
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
          return response()->json(['status' => true, 'message' => 'Feature Updated successfully!']);
      }
      return response()->json(['status' => true, 'message' => 'Feature Created successfully!']);
  }
  

  public function delete(Request $request)
  {
      $feature = Feature::find($request->id);
      if (!$feature) {
          // Handle the case where the category is not found
          return redirect()->back()->with('error', 'Feature not found.');
      }
  
      // Delete the associated image file
      if ($feature->image) {
          $imagePath = public_path('admin-asset/images/feature_images/' . $feature->image);
          if (file_exists($imagePath)) {
              unlink($imagePath); // Delete the image file
          }
      }
  
      $feature->delete();
  
      // Set a success message in the session
      Session::flash('success', 'Feature deleted successfully');
  
      return redirect()->back(); // Redirect back to the previous page
  }


  public function edit(Request $request){
     $categories = Feature::find($request->id);
     return $categories;
  }
  

}