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

Route::get('/', 'Home\PageController@welcome')->name('welcome');
Route::get('/blog/{slug}', 'Home\PageController@single')->name('single');
Route::get('/get-categories', 'Home\PageController@getCategories');
Route::get('/category/{slug}', 'Home\PageController@category')->name('category');
Route::get('/search', 'Home\PageController@search')->name('search');

Route::get('/about-me', 'Home\PageController@about')->name('about');
Route::get('/contact-me', 'Home\PageController@contact')->name('contact');
Route::post('contact-us', ['as' => 'contactus.store', 'uses' => 'Home\ContactUSController@contactUSPost']);

Route::post('newsletter', ['as' => 'newsletter.subscribe', 'uses' => 'Home\NewsletterController@subscribe']);
Route::get('thank-you', 'Home\NewsletterController@thankyou')->name('thankyou');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

