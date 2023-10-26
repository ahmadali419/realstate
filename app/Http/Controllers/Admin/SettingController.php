<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Setting;
use Carbon\Carbon;
use Auth;
use App\Models\UserFund;
use App\Models\UserWithdrawRequest;
class SettingController extends Controller
{
  public function index(){
    $settings = Setting::all()->pluck('value', 'name')->all();
    return view('admin.settings.index',get_defined_vars());
  }

  public function store(Request $request){
    $setting = $request->except('_token');
        foreach ($setting as $key => $value) {
            if (empty($value))
            continue;
                $set = Setting::where('name', $key)->first() ?: new Setting();
                $set->name = $key;
                if ($request->hasFile($key)) {
                    $existing = Setting::where('name', '=', $key)->first();
                    if ($existing) {
                        if (\File::exists(public_path('admin-asset/images/settings/'.$existing->value))) {
                            \File::delete(public_path('admin-asset/images/settings/'.$existing->value));
                        }
                    }
                }
                $set->value = $value;
                $set->save();
                if ($request->hasFile($key)) {
                    $existing = Setting::where('name', '=', $key)->first();
                    $image = $request->file($key);
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $imagePath = public_path('admin-asset/images/settings');
                    // Create the directory if it doesn't exist
                    if (!file_exists($imagePath)) {
                        mkdir($imagePath, 0755, true);
                    }
            
                    // Delete the previous image if it exists
                    // if ($feature->image && file_exists($imagePath . '/' . $feature->image)) {
                    //     unlink($imagePath . '/' . $feature->image);
                    // }
            
                    $image->move($imagePath, $imageName);
                    // $name = Helper::uploadMedia($image,$path);
                    Setting::where('name', '=', $key)->update([
                        'value' =>  $imageName
                    ]);
                }
        }
        return redirect()->back()->with('success','Settings Updated successfully!');
  }
}