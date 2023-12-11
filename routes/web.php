<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\noticeController;
use App\Models\sidelinktitle;

Route::get("/", [homeController::class, "index"])->name('home-page');
Route::get("about", [homeController::class, "about"])->name('about');
Route::get("contact", [homeController::class, "contact"])->name('contact');
Route::get("pages/{slug}", [homeController::class, "page"])->name('pages');
Route::get("view/notice", [noticeController::class, "viewNotice"])->name('view.notice');
Route::get("notice/{slug}", [noticeController::class, "noticeDetails"])->name('notice.details');


Route::get("details/{slug}", [homeController::class, "details_widget"])->name('details.details_widget');
Route::get("detailsread/{slug}", [homeController::class, "details_read"])->name('detailsread.details_read');


Route::get("side-details/{slug}", [homeController::class, "sidebarDetails"])->name('sidebar.details');
//Administration

Route::get("teachers", [homeController::class, "teachers"])->name('adminis.teachers');
Route::get("employees", [homeController::class, "employees"])->name('adminis.employee');
Route::get("committees", [homeController::class, "committees"])->name('adminis.committee');

Route::get("/test", function(){
	return sidelinktitle::with("sidelink")->get();
});

Route::get("developers", function(){
	return view('frontend.developers');
})->name('developers');



// $subjects = routePrefix();

// foreach ($subjects as $subject) {
//     Route::prefix($subject)->group(function () {

//     });
// }


