<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\member;
use Image;
use Session;
use Str;
use Validator;

class memberController extends Controller
{
    public function index(){
        $member = null;
        if(member::count() > 0){
            $member = member::orderBy("priority", "ASC")->get();
        }
        return view("backend.member.addmember", compact('member'));
    }

    public function store(Request $request){
        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:members",
                "priority"  => "required",
                "designation"  => "required",
                "description"  => "required",
                "image"     => "required|image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=450,height=565",
            ],[
               "image.dimensions" => "Image size must be 450x565",
               "image.max"        => "Image size less than 1 MB.",
            ]);

            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $member = new member();
            $member->name               = $request->name;
            $member->slug               = Str::slug($request->name);
            $member->designation        = $request->designation;
            $member->description        = $request->description;
            $member->priority           = $request->priority;
            if(isset($request->image)){
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $member->image   = $file;
            }
            $member->status     = $request->status;
            $member->save();
            if($member){
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
        $member = member::findOrFail($request->id);
        if($member){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $member
            ]);
        }
    }

    public function update(Request $request){

         if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:members,name,".$request->id,
                "priority"  => "required",
                "designation"  => "required",
                "description"  => "required"
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $member                     = member::find($request->id);
            $member->name               = $request->name;
            $member->slug               = Str::slug($request->name);
            $member->designation        = $request->designation;
            $member->description        = $request->description;
            $member->priority           = $request->priority;

            if(isset($request->image)){

                $validator = Validator::make($request->all(),[
                    "image"     => "required|image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=450,height=565",
                ],[
                   "image.dimensions" => "Image size must be 450x565",
                   "image.max"        => "Image size less than 1 MB.",
                ]);

                if($validator->fails()){
                    return response()->json([
                        "status" => "validatorError",
                        "data" => $validator->errors(),
                    ]);
                }
                @unlink($member->image);
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $member->image   = $file;
            }

            $member->status     = $request->status;
            $member->save();
            if($member){
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
        $member = member::findOrFail($request->id);
        @unlink($member->image);
        $member->delete();
        if($member){
            return redirect(route('memberadd.index'));
        }
    }


}
