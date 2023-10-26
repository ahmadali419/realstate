<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
  public function index(){
    $categories = Category::all();
    return view('admin.categories.list',get_defined_vars());
  }


  public function store(Request $request)
  {
      $category = null;
  
      // Validation rules
      $rules = [
        'name' => 'required|unique:categories,name,' . $request->id,
        'description' => 'required',
      ];
  
      // If it's an edit, remove the 'image' validation rule
      if ($request->id) {
          unset($rules['image']);
          $category = Category::find($request->id);
      } else {
          $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
          $category = new Category;
      }
  
      // Validate the request data
      $validator = \Validator::make($request->all(), $rules);
      if ($validator->fails()) {
          return response()->json([
              'status' => false,
              'message' => $validator->errors()
          ]); // Use the HTTP status code 422 (Unprocessable Entity)
      }
  
      $category->name = $request->name;
      $category->description = $request->description;
  
      // Handle the image if a new image is provided
      if ($request->hasFile('image')) {
          $image = $request->file('image');
          $imageName = time() . '.' . $image->getClientOriginalExtension();
          $imagePath = public_path('admin-asset/images/category_images');
  
          // Create the directory if it doesn't exist
          if (!file_exists($imagePath)) {
              mkdir($imagePath, 0755, true);
          }
  
          // Delete the previous image if it exists
          if ($category->image && file_exists($imagePath . '/' . $category->image)) {
              unlink($imagePath . '/' . $category->image);
          }
  
          $image->move($imagePath, $imageName);
          $category->image = $imageName;
      }
  
      $category->save();
      if($request->id){
          return response()->json(['status' => true, 'message' => 'Category Updated successfully!']);
      }
      return response()->json(['status' => true, 'message' => 'Category Created successfully!']);
  }
  

  public function delete(Request $request)
  {
      $category = Category::find($request->id);
      if (!$category) {
          // Handle the case where the category is not found
          return redirect()->back()->with('error', 'Category not found.');
      }
  
      // Delete the associated image file
      if ($category->image) {
          $imagePath = public_path('admin-asset/images/category_images/' . $category->image);
          if (file_exists($imagePath)) {
              unlink($imagePath); // Delete the image file
          }
      }
  
      $category->delete();
  
      // Set a success message in the session
      Session::flash('success', 'Category deleted successfully');
  
      return redirect()->back(); // Redirect back to the previous page
  }


  public function edit(Request $request){
     $categories = Category::find($request->id);
     return $categories;
  }
  

}