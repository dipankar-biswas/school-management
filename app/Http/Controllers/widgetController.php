<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\widget;
use Auth;
use Str;
use Image;
use Validator;
use Session;

class widgetController extends Controller
{
    public function index(){
        $widget = null;
        if(widget::count() > 0){
            $widget = widget::orderBy("priority","ASC")->get();
        }
        return view('backend.wedget.addwedget', compact('widget'));
    }

    public function create(Request $request){

        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:widgets",
                "priority"  => "required",
                "image"     => "required|image|mimes:jpg,jpeg,png,webp",
            ]);
            //max:1024|dimensions:width=512,height=512
            //,[
            //    "image.dimensions" => "Image size must be height 512px & width 512px." 
            // ]
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $widget = new widget();
            $widget->name       = $request->name;
            $widget->slug       = Str::slug($request->name);
            $widget->priority   = $request->priority;
            $widget->status     = $request->status;
            if(isset($request->image)){
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $widget->image   = $file;
            }
            $widget->save();
            if($widget){
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
        $widget = widget::findOrFail($request->id);
        if($widget){
            return response()->json([
                "status"    => "getSelectdata",
                "data"      => $widget
            ]);
        }
    }

    public function update(Request $request){

         if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                "name"      => "required|unique:widgets,name,".$request->id,
                "priority"  => "required"
            ]);
            //max:1024|dimensions:width=512,height=512
            //,[
            //    "image.dimensions" => "Image size must be height 512px & width 512px." 
            // ]
            if($validator->fails()){
                return response()->json([
                    "status" => "validatorError",
                    "data" => $validator->errors(),
                ]);
            }
            $widget             = widget::find($request->id);
            $widget->name       = $request->name;
            $widget->slug       = Str::slug($request->name);
            $widget->priority   = $request->priority;
            $widget->status     = $request->status;
            if(isset($request->image)){
                @unlink($widget->image);
                $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                Image::make($request->image)->save($file, 20);
                $widget->image   = $file;
            }
            $widget->save();
            if($widget){
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
        $widget = widget::findOrFail($request->id);
        @unlink($widget->image);
        $widget->delete();
        if($widget){
            return redirect(route('wedget.addwedget'));
        }
    }

}
