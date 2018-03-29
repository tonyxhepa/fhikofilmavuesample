<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/privacy-policy', 'HomeController@privacy')->name('privacy');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/dmca', 'HomeController@dmca')->name('dmca');

Route::group(['middleware'=>'admin'], function() {
    Route::get('/admin', function() {
        return view('admin.index');
    });
    Route::resource('admin/genres', 'Admin\GenreController');
    Route::resource('admin/movies', 'Admin\MovieController');
    Route::post('admin/movies/{id}/photos', 'Admin\MovieController@addPhoto');
    Route::post('admin/movies/{id}/embeds', 'Admin\MovieController@addEmbed');
    Route::post('admin/movies/{id}/shikolinks', 'Admin\MovieController@addShikolinks');
    Route::post('admin/movies/{id}/shkarkolinks', 'Admin\MovieController@addShkarkolinks');
    Route::post('admin/movies/{id}/trailerlinks', 'Admin\MovieController@addTrailerlinks');

//    Route::resource('admin/serials', 'Admin\SerialController');
//    Route::post('admin/serials/{id}/photos', 'Admin\SerialController@addPhoto');
//    Route::post('admin/serials/{id}/embeds', 'Admin\SerialController@addEmbed');
//    Route::post('admin/serials/{id}/shikolinks', 'Admin\SerialController@addShikolinks');
//    Route::post('admin/serials/{id}/shkarkolinks', 'Admin\SerialController@addShkarkolinks');
//    Route::post('admin/serials/{id}/trailerlinks', 'Admin\SerialController@addTrailerlinks');

});
Route::delete('/photos/{id}', 'Admin\PhotoController@destroy');
Route::delete('/embeds/{id}', 'Admin\EmbedController@destroy');
Route::delete('/shikolinks/{id}', 'Admin\ShikolinkController@destroy');
Route::delete('/shkarkolinks/{id}', 'Admin\ShkarkolinkController@destroy');
Route::delete('/trailerlinks/{id}', 'Admin\TrailerlinkController@destroy');

// Route::get('/', 'MovieController@index');
Route::get('/genre/{genre_slug}', 'MovieController@byGenre');
Route::get('/movies/{slug}', 'MovieController@show');