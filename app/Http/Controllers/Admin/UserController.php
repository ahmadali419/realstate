<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Role;
use Carbon\Carbon;
use Auth;
use App\Models\UserFund;
use App\Models\UserWithdrawRequest;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Validation\Rule; // Add this line to import the Rule class
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->where('role_id', '!=', '1')->get();
        $roles = Role::where('name', '!=', 'Admin')->get();
        return view('admin.users.list', get_defined_vars());
    }

    public function store(Request $request)
    {
        $userId = $request->input('id'); // Assuming you're passing the user ID as a hidden field in your form
        $rules = [
            'username' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($userId),
            ],
            'role_id' => 'required',
            'mobile' => 'required',
            'address' => 'required',
        ];

        // Add the password validation rule only when creating a new user
        if (empty($userId)) {
            $rules['password'] = 'required|min:8';
        }

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]); // Use the HTTP status code 422 (Unprocessable Entity)
        }
        try {
            $data = $request->except(['_token', 'id']);
            if(empty($userId)){
                $data['password'] = Hash::make($request->input('password')); // Hash the password
            }
            // Check if the user with the provided email already exists
            $existingUser = User::find($userId);
        
            if ($existingUser) {
                // Update the existing user data
                User::where('id', $existingUser->id)->update($data);
            } else {
                // Create a new user
                User::create($data);
            }
            if(!empty($userId)){
                return response()->json(['status'=>true , 'message'=>'User updated successfully!']);
            }
            return response()->json(['status'=>true , 'message'=>'User created successfully!']);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false, 'message' => $e->getMessage(),
                // 'line' => $e->getLine(),
                //  'file' => $e->getFile()
            ]);
        }
    }

    public function userList()
    {
        $users = User::with('role')->where('role_id', '!=', '1')->get();
        return $users;
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return $user;
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            // Handle the case where the user is not found
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->delete();

        // Set a success message in the session
        Session::flash('success', 'User deleted successfully');

        return redirect()->back(); // Redirect back to the previous page

    }
}
