<?php
namespace App\Helpers;

use App\Models\Setting;
use Carbon\Carbon;

class Helper
{
    public static  function uploadMedia($file, $path)
	{
	    $name = microtime() . '.' . $file->getClientOriginalExtension();
	    $file->move($path, $name);
	    return $path . '/' . $name;
	}
	public static  function setting($key)
	{
	    $setting = Setting::pluck('value', 'name');
	    return $setting[$key] ?? '';
	}
}