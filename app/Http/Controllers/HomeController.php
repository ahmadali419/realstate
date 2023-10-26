<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Property;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slides = Slider::where('type','slider')->limit(3)->latest()->get();
        $allProperty = Property::all();
        $rentProperty =  $allProperty->where('type','Rent')->count();
        $saleProperty =  $allProperty->where('type','Buy')->count();
        $totalAgents = User::whereHas('role', function ($query) {
            $query->where('name', 'Agent');
        })->count();
        $properties = Property::latest()->limit(4)->get();
        $blogs = Blog::latest('created_at')
        ->where('type','blog')
        ->latest()
        ->limit(5) // Limit the results to the most recent 5 blogs
        ->get();
        $agents = User::whereHas('role', function ($query) {
            $query->where('name', 'Agent');
        })
        ->latest()
        ->limit(5)
        ->get();
        $featuredProperties =  Property::where('featured',1)->latest()->limit(6)->get();
        $testimonials = Testimonial::limit(2)->where('type','testimonial')->get();
        return view('home',get_defined_vars());
    }

    public function about(){
        $settings = Setting::all()->pluck('value', 'name')->all();
        $testimonials = Testimonial::limit(2)->where('type','testimonial')->get();
        return view('about',get_defined_vars());
    }

    public function blog(){
        $blogs = Blog::where('type','blog')->paginate(10);
        $recentBlogs = Blog::latest('created_at')
        ->where('type','blog')
        ->limit(5) // Limit the results to the most recent 5 blogs
        ->get();
        return view('blogs.blog',get_defined_vars());
    }

    public function blogShow(Request $request){
        $blog = Blog::where(['type'=>'blog','slug'=>$request->slug])->first();
        $recentBlogs = Blog::latest('created_at')
        ->where('type','blog')
        ->limit(5) // Limit the results to the most recent 5 blogs
        ->get();
        return view('blogs.show',get_defined_vars());
    }


    public function agents(){
        $agents = User::whereHas('role', function ($query) {
            $query->where('name', 'Agent');
        })
        ->latest()
        ->limit(8)
        ->get();
        
        return view('agent',get_defined_vars());
    }

    public function contact(){
        $settings = Setting::all()->pluck('value', 'name')->all();
        return view('contact',get_defined_vars());
    }

    public function saveContact(Request $request)
    { 
        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "title" => $request->subject,
            "phone" => $request->phone,
            "message" => $request->message
        ]);
        return redirect()->back()->with('success','Your request has been sumbitted successfully! We will get back to you soon.');
    }
}
