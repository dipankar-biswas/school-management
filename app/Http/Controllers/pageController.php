<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\page;
use Image;
use Session;
use Str;
use Validator;

class pageController extends Controller
{
    public function index(){
        $page = null;
        if(page::count() > 0){
            $page = page::orderBy("id","DESC")->get();
        }
        return view('backend.page.addpage', compact('page'));
    }    


    public function static(){

        $statics = [
            "About"             =>   "about",
            "Contact"           =>   "contact",
            "teachers-list"     =>   "teachers",
            "employees-list"    =>   "employees",
            "committees-list"   =>   "committees",
        ];

        return view('backend.page.staticpage', compact('statics'));
    }

    public function store(Request $request){

        if($request->isMethod('post')){
            
            $validator = Validator::make($request->all(),[
                "name"          => "required|unique:pages",
                "description"   => "required"
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $page = new page();
            $page->name           = $request->name;
            $page->slug           = Str::slug($request->name);
            $page->description    = $request->description;
            $page->status         = $request->status;
            $page->save();
            if($page){
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
        $page       = page::findOrFail($request->id);
        if($page){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $page
            ]);
        }
    }

    public function update(Request $request){

       if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                "name"          => "required|unique:pages,name,".$request->id,
                "up_description"   => "required"
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
    
            $page                 = page::find($request->id);
            $page->name           = $request->name;
            $page->slug           = Str::slug($request->name);
            $page->description    = $request->up_description;
            $page->status         = $request->status;
            $page->save();
            if($page){
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

    public function delete(Request $request){
        $page = page::findOrFail($request->id)->delete();
        if($page){
            return redirect(route('pageadd.index'));
        }
    }
}
