<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\member;
use App\Models\navbar;
use App\Models\page;
use App\Models\slider;
use App\Models\notice;
use App\Models\User;
use Image;
use Session;
use Str;
use Validator;

class dashboardController extends Controller
{
    public function index(){
        $employees = null;
        if(employee::count() > 0){
            $employees = employee::limit(5)->orderBy("id","DESC")->get();
        }

        $members = null;
        if(member::count() > 0){
            $members = member::limit(5)->orderBy("id","DESC")->get();
        }

        $navbars = null;
        if(navbar::count() > 0){
            $navbars = navbar::limit(5)->orderBy("id","DESC")->get();
        }        

        $pages = null;
        if(page::count() > 0){
            $pages = page::limit(5)->orderBy("id","DESC")->get();
        }        

        $notices = null;
        if(notice::count() > 0){
            $notices = notice::limit(5)->orderBy("id","DESC")->get();
        }


        $sliders = null;
        if(slider::count() > 0){
            $sliders = slider::limit(5)->orderBy("id","DESC")->get();
        }

        $users = null;
        if(User::count() > 0){
            $users = User::limit(5)->orderBy("id","DESC")->get();
        }

        return view('backend.dashboard.dashboard', compact('employees','pages','members','notices','navbars','sliders','users'));

    }

    public function store(Request $request){

    }

    public function edit(){
        
    }

    public function update(Request $request){
        
    }

    public function delete(Request $request){
        
    }
}
