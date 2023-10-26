<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Carbon\Carbon;
use Auth;
use App\Models\UserFund;
use App\Models\UserWithdrawRequest;

class AdminController extends Controller
{
  public function index(){
    return view('admin.dashboard',get_defined_vars());
  }
}