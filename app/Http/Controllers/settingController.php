<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\setting;
use Image;
use Session;
use Str;
use Validator;

class settingController extends Controller
{
    public function index(){

    }





    public function store(Request $request){


        if(setting::where("id", 1)->count() == 0){

            if($request->isMethod('post')){
                $validator = Validator::make($request->all(),[
                    "name"      => "required",
                    "address"   => "required",
                    "logo"      => "required|image|mimes:jpg,jpeg,png,webp|max:1024",
                    "email"     => "required",
                    "phone"     => "required",
                    "maps"     => "required",
                    "banner"      => "required|image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=1200,height=500",
                    "emimage"   => "required|image|mimes:jpg,jpeg,png,webp|max:1024",
                    "about"     => "required",
                ],
                [
                    "logo.max"        => "Image size less than 1 MB.",
                    "banner.dimensions" => "Image size must be 1200x500",
                    "banner.max"        => "Image size 1200x500 and less than 1 MB.",
                    "emimage.max"        => "Image size less than 1 MB.",
                 ]);
                if($validator->fails()){
                    return response()->json([
                        "status" => "validatorError",
                        "data" => $validator->errors(),
                    ]);
                }
                $setting = new setting();
                $setting->name       = $request->name;
                $setting->address    = $request->address;
                $setting->email      = $request->email;
                $setting->phone      = $request->phone;
                $setting->maps      = $request->maps;
                $setting->about      = $request->about;
                $setting->bannerlink = $request->bannerlink;
                $setting->keywords   = $request->keywords;
                $setting->metadescription   = $request->metadescription;
                $setting->likepage   = $request->likepage;

                if(isset($request->logo)){
                    $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                    Image::make($request->logo)->save($file, 20);
                    $setting->logo   = $file;
                }

                if(isset($request->emimage)){
                    $file = "uploads/".substr(md5(time()), 0, 13)."."."webp";
                    Image::make($request->emimage)->save($file, 20);
                    $setting->emimage   = $file;
                }

                if(isset($request->banner)){
                    $file = "uploads/".substr(md5(time()), 0, 12)."."."webp";
                    Image::make($request->banner)->save($file, 20);
                    $setting->banner   = $file;
                }

                $setting->save();

                if($setting){
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
        }else{

            if($request->isMethod('post')){
                $validator = Validator::make($request->all(),[
                    "name"      => "required",
                    "address"   => "required",
                    "email"     => "required",
                    "phone"     => "required",
                    "maps"     => "required",
                    "about"     => "required",
                ]);
                if($validator->fails()){
                    return response()->json([
                        "status" => "validatorError",
                        "data" => $validator->errors(),
                    ]);
                }

                $setting = setting::find(1);
                $setting->name              = $request->name;
                $setting->address           = $request->address;
                $setting->email             = $request->email;
                $setting->phone             = $request->phone;
                $setting->maps             = $request->maps;
                $setting->about             = $request->about;
                $setting->bannerlink        = $request->bannerlink;
                $setting->keywords          = $request->keywords;
                $setting->metadescription   = $request->metadescription;
                $setting->likepage          = $request->likepage;

                if(isset($request->logo)){
                    $validator = Validator::make($request->all(),[
                        "logo"      => "required|image|mimes:jpg,jpeg,png,webp|max:1024",
                    ],
                    [
                        "logo.max"        => "Image size less than 1 MB.",
                     ]);
                    if($validator->fails()){
                        return response()->json([
                            "status" => "validatorError",
                            "data" => $validator->errors(),
                        ]);
                    }

                    @unlink($setting->logo);
                    $file = "uploads/".substr(md5(time()), 0, 10)."."."webp";
                    Image::make($request->logo)->save($file, 20);
                    $setting->logo   = $file;
                }

                if(isset($request->emimage)){
                    $validator = Validator::make($request->all(),[
                        "emimage"      => "required|image|mimes:jpg,jpeg,png,webp|max:1024",
                    ],
                    [
                        "emimage.max"        => "Image less than 1 MB.",
                     ]);
                    if($validator->fails()){
                        return response()->json([
                            "status" => "validatorError",
                            "data" => $validator->errors(),
                        ]);
                    }
                    @unlink($setting->emimage);
                    $file = "uploads/".substr(md5(time()), 0, 13)."."."webp";
                    Image::make($request->emimage)->save($file, 20);
                    $setting->emimage   = $file;
                }

                if(isset($request->banner)){
                    $validator = Validator::make($request->all(),[
                        "banner"      => "required|image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=1200,height=500",
                    ],
                    [
                        "banner.dimensions" => "Image size must be 1200x500",
                        "banner.max"        => "Image size 1200x500 and less than 1 MB.",
                     ]);
                    if($validator->fails()){
                        return response()->json([
                            "status" => "validatorError",
                            "data" => $validator->errors(),
                        ]);
                    }
                    @unlink($setting->banner);
                    $file = "uploads/".substr(md5(time()), 0, 12)."."."webp";
                    Image::make($request->banner)->save($file, 20);
                    $setting->banner   = $file;
                }

                $setting->save();

                if($setting){
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



    }




    public function edit(){
        
    }

    public function update(Request $request){
        
    }

    public function delete(Request $request){
        
    }
}
