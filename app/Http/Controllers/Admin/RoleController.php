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

class RoleController extends Controller
{
  public function index(){
    $roles = Role::where('name', '!=', 'Admin')->get();
    return view('admin.roles.list',get_defined_vars());
  }
}