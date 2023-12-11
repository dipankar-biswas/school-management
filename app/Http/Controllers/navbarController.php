<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\navbar;
use Image;
use Session;
use Str;
use Validator;

class navbarController extends Controller
{
    public function index(){
        $navbar         = null;
        $navbarsub      = null;
        if(navbar::count() > 0){
            $navbar = navbar::orderBy("name","ASC")->get();
        }
        if(navbar::where("parentid", 0)->count() > 0){
            $navbarsub = navbar::where("parentid", 0)->orderBy("name","ASC")->get();
        }
        return view("backend.navbar.addnavbar", compact('navbar', 'navbarsub'));
    }

    public function store(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:navbars",
                "parentid"  => "required",
                "link"      => "required",
                "priority"  => "required",
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $navbar = new navbar();
            $navbar->name               = $request->name;
            $navbar->slug               = Str::slug($request->name);
            $navbar->parentid           = $request->parentid;
            $navbar->link               = $request->link;
            $navbar->priority           = $request->priority;
            $navbar->status             = $request->status;
            $navbar->save();
            if($navbar){
                Session::put('success', 'Data inserted successfully!');
                return response()->json([
                    "reload" => true
                ]);
            }else{
                Session::put('error', 'Data not deleted!');
                return response()->json([
                    "reload" => true
                ]);
            }
        }
    }

    public function edit(Request $request){

        $navbar = navbar::findOrFail($request->id);
        $navbarsub      = null;
        if(navbar::where("parentid", 0)->count() > 0){
            $navbarsub = navbar::where("parentid", 0)->orderBy("name","ASC")->get();
        }

        if($navbar){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $navbar,
                "navbarsub" => $navbarsub
            ]);
        }
        
    }

    public function update(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:navbars,name,".$request->id,
                "parentid"  => "required",
                "link"      => "required",
                "priority"  => "required",
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $navbar = navbar::findOrFail($request->id);
            $navbar->name               = $request->name;
            $navbar->slug               = Str::slug($request->name);
            $navbar->parentid           = $request->parentid;
            $navbar->link               = $request->link;
            $navbar->priority           = $request->priority;
            $navbar->status             = $request->status;
            $navbar->save();
            if($navbar){
                Session::put('success', 'Data updated successfully!');
                return response()->json([
                    "reload" => true
                ]);
            }else{
                Session::put('error', 'Data not deleted!');
                return response()->json([
                    "reload" => true
                ]);
            }
        }
    }

    public function delete(Request $request){
        $navbar = navbar::findOrFail($request->id)->delete();
        if($navbar){
            return redirect(route('navbaradd.index'));
        }
    }
}
