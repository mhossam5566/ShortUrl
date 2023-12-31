<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinksController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
  Route::get("/", [LinksController::class, "index"]);

  Route::get("/statistic/{code}", [LinksController::class, "statistic"]);
});

Route::get("/{slug}", [LinksController::class, "redirect"]);
