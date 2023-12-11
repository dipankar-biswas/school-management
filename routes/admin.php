<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\widgetController;
use App\Http\Controllers\widgetLinkController;
use App\Http\Controllers\sidelinkController;
use App\Http\Controllers\sidelinktitleController;
use App\Http\Controllers\sliderController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\navbarController;
use App\Http\Controllers\noticeController;
use App\Http\Controllers\scrollnoticeController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\sideImageController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\dashboardController;



/*Controller*/
Route::get("loginpanel",[loginController::class,"ulogin"])->name("login");
Route::post("loginCheck",[loginController::class,"uloginCheck"])->name("loginCheck.uloginCheck");

Route::group(['middleware'=>'auth','prefix' => "admin"], function(){

    /*dashboardController*/
    Route::get("dashboard",[dashboardController::class,"index"])->name("dashboard.index");
    
    /*dashboardController*/
    Route::get("profile",[AdminProfileController::class,"index"])->name("user.profile");
    Route::post('/profile-udate',[AdminProfileController::class,'profileUpdate'])->name("profile.udate");
    Route::post('/password-change',[AdminProfileController::class,'passwordChange'])->name("password.change");

    /*widgetController*/
    Route::get("wedget",[widgetController::class,"index"])->name("wedget.addwedget");
    Route::post("wcreate",[widgetController::class,"create"])->name("wedget.create");
    Route::get("wcedit",[widgetController::class,"edit"])->name("wcedit.edit");
    Route::post("weupdate",[widgetController::class,"update"])->name("weupdate.update");
    Route::get("wedelete",[widgetController::class,"delete"])->name("wedelete.delete");


    /*widgetLinkController*/
    Route::get("wedgetlink",[widgetLinkController::class,"index"])->name("wedgetlink.index");
    Route::post("wedgetlinkedit",[widgetLinkController::class,"store"])->name("wedgetlinkedit.store");
    Route::get("wedgetlinkedit",[widgetLinkController::class,"edit"])->name("wedgetlinkedit.edit");
    Route::post("wedgetlinkupdate",[widgetLinkController::class,"update"])->name("wedgetlinkupdate.update");
    Route::get("wedgetlinkdelete",[widgetLinkController::class,"delete"])->name("wedgetlinkdelete.delete");


    /*sidelinktitleController*/
    Route::get("sltadd",[sidelinktitleController::class,"index"])->name("sltadd.index");
    Route::post("sltestore",[sidelinktitleController::class,"store"])->name("sltestore.store");
    Route::get("sltedit",[sidelinktitleController::class,"edit"])->name("sltedit.edit");
    Route::post("sltupdate",[sidelinktitleController::class,"update"])->name("sltupdate.update");
    Route::get("sltdelete",[sidelinktitleController::class,"delete"])->name("sltdelete.delete");


    /*sidelinkController*/
    Route::get("sladd",[sidelinkController::class,"index"])->name("sladd.index");
    Route::post("slestore",[sidelinkController::class,"store"])->name("slestore.store");
    Route::get("sledit",[sidelinkController::class,"edit"])->name("sledit.edit");
    Route::post("slupdate",[sidelinkController::class,"update"])->name("slupdate.update");
    Route::get("sldelete",[sidelinkController::class,"delete"])->name("sldelete.delete");

    

    /*sliderController*/
    Route::get("sadd",[sliderController::class,"index"])->name("sadd.index");
    Route::post("sstore",[sliderController::class,"store"])->name("sstore.store");
    Route::get("sedit",[sliderController::class,"edit"])->name("sedit.edit");
    Route::post("supdate",[sliderController::class,"update"])->name("supdate.update");
    Route::get("sdelete",[sliderController::class,"delete"])->name("sdelete.delete");    


    /*sliderController*/
    Route::get("settingadd",[settingController::class,"index"])->name("settingadd.index");
    Route::post("settingstore",[settingController::class,"store"])->name("settingstore.store");
    Route::get("settingedit",[settingController::class,"edit"])->name("settingedit.edit");
    Route::post("settingupdate",[settingController::class,"update"])->name("settingupdate.update");
    Route::get("settingdelete",[settingController::class,"delete"])->name("settingdelete.store");


    /*memberController*/
    Route::get("memberadd",[memberController::class,"index"])->name("memberadd.index");
    Route::post("memberstore",[memberController::class,"store"])->name("memberstore.store");
    Route::get("memberedit",[memberController::class,"edit"])->name("memberedit.edit");
    Route::post("memberupdate",[memberController::class,"update"])->name("memberupdate.update");
    Route::get("memberdelete",[memberController::class,"delete"])->name("memberdelete.delete");


    /*navbarController*/
    Route::get("navbaradd",[navbarController::class,"index"])->name("navbaradd.index");
    Route::post("navbarstore",[navbarController::class,"store"])->name("navbarstore.store");
    Route::get("navbaredit",[navbarController::class,"edit"])->name("navbaredit.edit");
    Route::post("navbarupdate",[navbarController::class,"update"])->name("navbarupdate.update");

    Route::get("navbardelete",[navbarController::class,"delete"])->name("navbardelete.store");


    /*noticeController*/
    Route::get("noticeadd",[noticeController::class,"index"])->name("noticeadd.index");
    Route::post("noticestore",[noticeController::class,"store"])->name("noticestore.store");
    Route::get("noticeedit",[noticeController::class,"edit"])->name("noticeedit.edit");
    Route::post("noticeupdate",[noticeController::class,"update"])->name("noticeupdate.update");
    Route::get("noticedelete",[noticeController::class,"delete"])->name("noticedelete.delete");


    /*noticeController*/
    Route::get("snoticeadd",[scrollnoticeController::class,"index"])->name("snoticeadd.index");
    Route::post("snoticestore",[scrollnoticeController::class,"store"])->name("snoticestore.store");
    Route::get("snoticeedit",[scrollnoticeController::class,"edit"])->name("snoticeedit.edit");


    Route::post("snoticeupdate",[scrollnoticeController::class,"update"])->name("snoticeupdate.update");

    Route::get("snoticedelete",[scrollnoticeController::class,"delete"])->name("snoticedelete.delete");



    /*pageController*/
    Route::get("pageadd",[pageController::class,"index"])->name("pageadd.index");
    Route::get("staticpage",[pageController::class,"static"])->name("staticpage.static");
    Route::post("pagestore",[pageController::class,"store"])->name("pagestore.store");
    Route::get("pageedit",[pageController::class,"edit"])->name("pageedit.edit");
    Route::post("pageupdate",[pageController::class,"update"])->name("pageupdate.update");
    Route::get("pagedelete",[pageController::class,"delete"])->name("pagedelete.delete");


    /*sideImageController*/
    Route::get("siadd",[sideImageController::class,"index"])->name("siadd.index");
    Route::post("sistore",[sideImageController::class,"store"])->name("sistore.store");
    Route::get("siedit",[sideImageController::class,"edit"])->name("siedit.edit");
    Route::post("siupdate",[sideImageController::class,"update"])->name("siupdate.update");
    Route::get("sidelete",[sideImageController::class,"delete"])->name("sidelete.delete");



    /*pageController*/
    Route::get("emadd",[employeeController::class,"index"])->name("emadd.index");
    Route::post("emstore",[employeeController::class,"store"])->name("emstore.store");
    Route::get("emedit",[employeeController::class,"edit"])->name("emedit.edit");
    Route::post("emupdate",[employeeController::class,"update"])->name("emupdate.update");
    Route::get("emdelete",[employeeController::class,"delete"])->name("emdelete.delete");


    /*pageController*/
    Route::get("userdd",[userController::class,"index"])->name("userdd.index");
    Route::post("userstore",[userController::class,"store"])->name("userstore.store");
    Route::get("userdit",[userController::class,"edit"])->name("userdit.edit");
    Route::post("userupdate",[userController::class,"update"])->name("userupdate.update");
    Route::get("userdelete",[userController::class,"delete"])->name("userdelete.delete");

    /*loginController*/
    Route::get("logout",[loginController::class,"ulogout"])->name("login.ulogout");


});

