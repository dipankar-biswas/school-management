<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\sidelinktitle;
use App\Models\sideimage;
use Image;
use Session;
use Str;
use Validator;

class sideImageController extends Controller
{
    public function index(){

        $sidelinktitle = null;
        if(sidelinktitle::where("status", 1)->count() > 0){
            $sidelinktitle = sidelinktitle::where("status", 1)->orderBy("id","DESC")->get();
        }

        $sideimage = null;
        if(sideimage::count() > 0){
            $sideimage = sideimage::orderBy("id","DESC")->get();
        }

        return view("backend.sidelink.addsideimage", compact('sideimage','sidelinktitle'));
    }

    public function store(Request $request){
        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"          => "required|unique:sidelinktitles",
                "sltid"         => "required",
                "image"     => "required|image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=900,height=505",
                ],[
               "image.dimensions" => "Image size must be 900x505",
               "image.max"        => "Image size less than 1 MB.",
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $sideimage = new sideimage();
            $sideimage->name       = $request->name;
            $sideimage->sltid      = $request->sltid;
            $sideimage->link       = $request->link;
            if(isset($request->image)){
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $sideimage->image   = $file;
            }
            $sideimage->status     = $request->status;
            $sideimage->save();  
            if($sideimage){
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
        $sideimage = sideimage::findOrFail($request->id);
        if($sideimage){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $sideimage
            ]);
        }
    }

    public function update(Request $request){

         if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"          => "required|unique:sidelinktitles,name,".$request->name,
                "sltid"         => "required",
                "link"          => "required"
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }

            $sideimage = sideimage::find($request->id);
            $sideimage->name       = $request->name;
            $sideimage->sltid      = $request->sltid;
            $sideimage->link       = $request->link;
            if(isset($request->image)){
                $validator = Validator::make($request->all(),[
                    "image"     => "required|image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=900,height=505",
                ],[
                       "image.dimensions" => "Image size must be 900x505",
                       "image.max"        => "Image size less than 1 MB.",
                ]);

                if($validator->fails()){
                    return response()->json([
                        "status" => "validatorError",
                        "data" => $validator->errors(),
                    ]);
                }
                @unlink($sideimage->image);
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $sideimage->image   = $file;
            }
            $sideimage->status     = $request->status;
            $sideimage->save();  
            if($sideimage){
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
        $sideimage = sideimage::findOrFail($request->id);
        @unlink($sideimage->image);
        $sideimage->delete();
        if($sideimage){
            return redirect(route('siadd.index'));
        }
    }


}
