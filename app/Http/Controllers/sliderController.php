<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\slider;
use Image;
use Session;
use Str;
use Validator;

class sliderController extends Controller
{
    public function index(){
        $slider      = null;
        if(slider::count() > 0){
            $slider = slider::orderBy("name","ASC")->get();
        }
        return view("backend.slider.slider", compact('slider'));
    }

    public function store(Request $request){
        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:sliders",
                "priority"  => "required",
                "image"     => "required|image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=960,height=300",
            ],[
                   "image.dimensions" => "Image size must be 960x300",
                   "image.max"        => "Image size less than 1 MB.",
            ]);

            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $slider = new slider();
            $slider->name       = $request->name;
            $slider->priority   = $request->priority;
            if(isset($request->image)){
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $slider->image   = $file;
            }
            $slider->status     = $request->status;
            $slider->save();
            if($slider){
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
        $slider = slider::findOrFail($request->id);
        if($slider){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $slider
            ]);
        }
    }

    public function update(Request $request){

         if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:sliders,name,".$request->id,
                "priority"  => "required"
            ]);
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $slider             = slider::find($request->id);
            $slider->name       = $request->name;
            $slider->priority   = $request->priority;
            if(isset($request->image)){
                $validator = Validator::make($request->all(),[
                    "image"     => "required|image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=960,height=300",
                ],[
                       "image.dimensions" => "Image size must be 960x300",
                       "image.max"        => "Image size less than 1 MB.",
                ]);

                if($validator->fails()){
                    return response()->json([
                        "status" => "validatorError",
                        "data" => $validator->errors(),
                    ]);
                }

                @unlink($slider->image);
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $slider->image   = $file;
            }
            $slider->status     = $request->status;
            $slider->save();
            if($slider){
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
        $slider = slider::findOrFail($request->id);
        @unlink($slider->image);
        $slider->delete();
        if($slider){
            return redirect(route('sadd.index'));
        }
    }



}
