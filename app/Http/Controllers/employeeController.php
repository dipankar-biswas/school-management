<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\employee;
use Image;
use Session;
use Str;
use Validator;

class employeeController extends Controller
{
    public function index(){
        $employee = null;
        if(employee::count() > 0){
            $employee = employee::orderBy("id", "DESC")->get();
        }
        return view("backend.member.addemployee", compact('employee'));
    }

    public function store(Request $request){
        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:members",
                "priority"  => "required",
                "designation"  => "required",
                "category"  => "required",
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
            $employee                 = new employee();
            $employee->name           = $request->name;
            $employee->designation    = $request->designation;
            $employee->mobail         = $request->mobail;
            $employee->email          = $request->email;
            $employee->address        = $request->address;
            $employee->priority       = $request->priority;
            $employee->category       = $request->category;
            if(isset($request->image)){
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $employee->image      = $file;
            }
            $employee->status         = $request->status;
            $employee->save();
            if($employee){
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
        $employee = employee::findOrFail($request->id);
        if($employee){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $employee
            ]);
        }
    }

    public function update(Request $request){

         if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:members",
                "priority"  => "required",
                "designation"  => "required",
                "category"  => "required"
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $employee                 = employee::find($request->id);
            $employee->name           = $request->name;
            $employee->designation    = $request->designation;
            $employee->mobail         = $request->mobail;
            $employee->email          = $request->email;
            $employee->address        = $request->address;
            $employee->priority       = $request->priority;
            $employee->category       = $request->category;
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
                @unlink($employee->image);
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $employee->image      = $file;
            }
            $employee->status         = $request->status;
            $employee->save();
            if($employee){
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
        $employee = employee::findOrFail($request->id);
        @unlink($employee->image);
        $employee->delete();
        if($employee){
            return redirect(route('emadd.index'));
        }
    }
}
