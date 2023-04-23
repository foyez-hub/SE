<?php
use App\Models\movie_info;
use App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Models\memeinfo;
use App\Http\Controllers\MemeController;

use Illuminate\Support\Facades\Route;
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




Route::get('/', 'App\Http\Controllers\HomepageController@index');




Route::get('/streaming', 'App\Http\Controllers\HomepageController@play')->name('streaming');





Route::get('/movies', function () {
    return view('movies');
});



Route::get('/meme', function () {
    return view('meme');
});








Route::get('/api', function () {
    $users = movie_info::all();

    $status = 'OK';

    $data = ["status" => $status, "content" => $users];
    header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	echo json_encode($data); 
});




Route::get('/memeinfo', 'App\Http\Controllers\MemeController@memeinfo')->name('memeinfo');




Route::get('/search','App\Http\Controllers\SearchController@search')->name('search-results');




Route::get('/realsearch', 'App\Http\Controllers\SearchController@searchResults')->name('realsearch');


Route::get('/memes', 'App\Http\Controllers\MemeController@searchResults')->name('memes');
Route::get('/voteupdate', 'App\Http\Controllers\MemeController@voteupdate')->name('voteupdate');

Route::get('/fullmemedatabase', 'App\Http\Controllers\MemeController@fullmemedatabase')->name('fullmemedatabase');
Route::get('/allData', [MemeController::class,'allData']);
Route::get('/vote{time}', [MemeController::class,'vote']);
Route::get('/ckvote{time}', [MemeController::class,'ckvote']);

Route::post('/memestore', [MemeController::class,'memestore']);
Route::post('/searchbar', [SearchController::class,'searchbar']);
