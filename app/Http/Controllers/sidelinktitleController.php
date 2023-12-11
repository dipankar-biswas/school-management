<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\sidelinktitle;
use Image;
use Session;
use Str;
use Validator;

class sidelinktitleController extends Controller
{
    public function index(){
        $sidelinktitle = null;
        if(sidelinktitle::count() > 0){
            $sidelinktitle = sidelinktitle::orderBy("id","DESC")->get();
        }
        return view("backend.sidelink.sidelinktitle", compact('sidelinktitle'));
     }

    public function store(Request $request){
        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:sidelinktitles",
                "priority"  => "required"
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $sidelinktitle = new sidelinktitle();
            $sidelinktitle->name       = $request->name;
            $sidelinktitle->priority   = $request->priority;
            $sidelinktitle->status     = $request->status;
            $sidelinktitle->save();
            if($sidelinktitle){
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
        $sidelinktitle = sidelinktitle::findOrFail($request->id);
        if($sidelinktitle){
           return response()->json([
                        "status"    => "getSelectdata",
                        "data"      => $sidelinktitle
                    ]); 
        }
        
    }

    public function update(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:sidelinktitles,name,".$request->id,
                "priority"  => "required"
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $sidelinktitle = sidelinktitle::find($request->id);
            $sidelinktitle->name       = $request->name;
            $sidelinktitle->priority   = $request->priority;
            $sidelinktitle->status     = $request->status;
            $sidelinktitle->save();
            if($sidelinktitle){
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
        $sidelinktitle = sidelinktitle::findOrFail($request->id)->delete();
        if($sidelinktitle){
           return redirect(Route('sltadd.index')); 
        }
        
    }
}
