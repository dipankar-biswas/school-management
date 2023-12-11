<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\sidelinktitle;
use App\Models\sidelink;
use Image;
use Session;
use Str;
use Validator;

class sidelinkController extends Controller
{
    public function index(){

        $sidelinktitle = null;
        if(sidelinktitle::where("status", 1)->count() > 0){
            $sidelinktitle = sidelinktitle::where("status", 1)->orderBy("id","DESC")->get();
        }

        $sidelink = null;
        if(sidelink::count() > 0){
            $sidelink = sidelink::orderBy("id","DESC")->get();
        }

        return view("backend.sidelink.sidelink", compact('sidelinktitle', 'sidelink'));
    }

    public function store(Request $request){

        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"          => "required|unique:sidelinktitles",
                "sltid"         => "required",
                "targetlink"    => "required",
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $sidelink = new sidelink();
            $sidelink->name       = $request->name;
            $sidelink->sltid      = $request->sltid;
            $sidelink->linkstatus = $request->linkstatus;
            $sidelink->targetlink = $request->targetlink;
            $sidelink->status     = $request->status;
            $sidelink->save();  
            if($sidelink){
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
        $sidelink = sidelink::findOrFail($request->id);
        if($sidelink){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $sidelink
            ]); 
        }
        
    }

    public function update(Request $request){
        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"          => "required|unique:sidelinktitles",
                "sltid"         => "required",
                "targetlink"    => "required",
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $sidelink             = sidelink::find($request->id);
            $sidelink->name       = $request->name;
            $sidelink->sltid      = $request->sltid;
            $sidelink->linkstatus = $request->linkstatus;
            $sidelink->targetlink = $request->targetlink;
            $sidelink->status     = $request->status;
            $sidelink->save();  
            if($sidelink){
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
        $sidelink = sidelink::findOrFail($request->id)->delete();
        if($sidelink){
           return redirect(Route('sladd.index')); 
        }
        
    }



}
