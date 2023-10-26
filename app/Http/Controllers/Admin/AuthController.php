<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    /**
     * login a admin user display.
     */
    public function login()
    {
        return view("admin.login");
    }

    public function loginAdmin(Request $request)
    {
        $this->validate($request, [
          'email'   => 'required|email',
          'password'  => 'required|min:8'
        ]);

        $user_data = array(
          'email'  => $request->email,
          'password' => $request->password
        );
        if(Auth::attempt($user_data))
        {
          return redirect('admin/dashboard');
        }
        else
        {
          return back()->with('error', 'Wrong Login Details');
        }
    }
    protected function logout()
    {
        if (Auth::check()) {
            $this->guard()->logout();
            return redirect('/admin/login');
            // if(Auth::user()->hasRole('admin')){
            // }
            // if(Auth::user()->hasRole('client')){
            //     $this->guard()->logout();
            //     return redirect('/');
            // }
        }
        else{
            return redirect('/');
        }
    }

}