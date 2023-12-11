<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\widget;
use App\Models\widgetLink;
use App\Models\page;
use App\Models\employee;
use App\Models\member;
use Image;
use Session;
use Str;
use Validator;

class homeController extends Controller
{
    public function index(){
        $widget = null;
        if(widget::where("status", 1)->count() > 0){
            $widget = widget::where("status", 1)->orderby("priority", "ASC")->with("widgetLink")->get();
        }
        if(theme() === 'v2' || theme() === 'v4'){
            return view('frontend.home.index-v2', compact('widget'));
        }else{
            return view('frontend.home.index', compact('widget'));
        }
            
    }    


    public function page($slug){
        $page = page::where("slug", $slug)->where("status", 1)->firstOrFail(); 
        return view('frontend.home.pages', compact('page'));
    }    

    public function details_widget($slug){
        $widgetLink = widgetLink::where("slug", $slug)->firstOrFail(); 
        return view('frontend.home.details', compact('widgetLink'));
    }    

    public function details_read($slug){
        $widgetLink = widgetLink::where("slug", $slug)->firstOrFail();
        //return $widgetLink;
        return view('frontend.home.detailsfile', compact('widgetLink'));
    }  

    public function sidebarDetails($slug){
        $member = member::where("status", 1)->where("slug", $slug)->firstOrFail(); 
        return view('frontend.home.sidebar-details', compact('member'));
    }   

    public function teachers(){
        $teachers   = null;
        if(employee::where("category", 1)->count() > 0){
            $teachers = employee::where("category", 1)->get();
        }
        return view("frontend.home.teacher", compact('teachers'));
    }

    public function employees(){
        $employees   = null;
        if(employee::where("category", 2)->count() > 0){
            $employees = employee::where("category", 2)->get();
        }
        return view("frontend.home.employee", compact('employees'));
    }

    public function committees(){
        $committees   = null;
        if(employee::where("category", 3)->count() > 0){
            $committees = employee::where("category", 3)->get();
        }
        return view("frontend.home.committee", compact('committees'));
    }







    public function about(){
        return view('frontend.home.about');
    }
    public function contact(){
        return view('frontend.home.contact');
    }
}
