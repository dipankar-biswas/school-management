<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\scrollnotice;
use Image;
use Session;
use Str;
use Validator;

class scrollnoticeController extends Controller
{
    public function index(){
        $scrollnotice      = null;
        if(scrollnotice::count() > 0){
            $scrollnotice = scrollnotice::orderBy("name","ASC")->get();
        }
        return view("backend.notice.scrollnotice", compact('scrollnotice'));
    }

    public function store(Request $request){
       if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:members",
                "link"      => "required",
                "priority"  => "required",
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $scrollnotice = new scrollnotice();
            $scrollnotice->name               = $request->name;
            $scrollnotice->slug               = Str::slug($request->name);
            $scrollnotice->link               = $request->link;
            $scrollnotice->priority           = $request->priority;
            $scrollnotice->status             = $request->status;
            $scrollnotice->save();
            if($scrollnotice){
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
        $scrollnotice = scrollnotice::findOrFail($request->id);
        if($scrollnotice){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $scrollnotice
            ]);
        }
    }

    public function update(Request $request){

         if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:scrollnotices,name,".$request->id,
                "link"      => "required",
                "priority"  => "required",
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $scrollnotice                     = scrollnotice::find($request->id);
            $scrollnotice->name               = $request->name;
            $scrollnotice->slug               = Str::slug($request->name);
            $scrollnotice->link               = $request->link;
            $scrollnotice->priority           = $request->priority;
            $scrollnotice->status             = $request->status;
            $scrollnotice->save();
            if($scrollnotice){
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
        $scrollnotice = scrollnotice::findOrFail($request->id)->delete();
        if($scrollnotice){
            return redirect(route('snoticeadd.index'));
        }
    }

}
