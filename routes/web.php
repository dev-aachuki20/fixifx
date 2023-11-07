<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call(' optimize:clear');
    return "Cache is cleared";
});

Route::get('/', function () {
    return redirect()->route('page', [config('app.locale'), 'home']);
});

Route::group(['middleware' => 'localization'], function () {
    Route::get('privacy-policy', 'HomeController@privacyPage')->name('privacy_page');
    Route::get('terms-condition', 'HomeController@termsPage')->name('terms_page');
    Route::get('refresh-captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');

    Route::get('language/front/{locale}', 'HomeController@changeLanguage')->name('language.change');

    Route::get('sitemap', function () {
        return view('front.sitemap');
    });

    Route::get('{locale}/{slug}', 'HomeController@page')->name('page');

    Route::get('{locale}/{slug}/{article_id?}/detail', 'HomeController@page')->name('detail');
    Route::get('{slug}/{category_id?}/category-list', 'HomeController@list')->name('list');

    Route::get('download/{file?}', function ($file) {
        $path = public_path('storage/Section/' . $file);
        if (File::exists($path)) {
            return response()->download($path);
        } else {
            abort(404);
        }
    })->name('download');

    Route::post('contact-us', 'HomeController@contactUs')->name('contact_us');
    Route::post('post-comment', 'HomeController@postComment')->name('post_comment');
    Route::post('newsletter', 'HomeController@newsLetter')->name('newsletter');
    Route::post('get_media', 'HomeController@getMedia')->name('get_media');

    Route::get('search-faqs', 'HomeController@searchFaqs')->name('search_faqs');
    // ajax
    Route::get('/load-content', 'HomeController@loadContent')->name('loadContent');

    // vps enquiry route
    Route::post('vps-enquiry', 'HomeController@vpsEnquiry')->name('vps_enquiry');
});

Route::post('get_rate', 'HomeController@getChangeRate')->name('getChangeRate');
Route::get('get_flag/{currency_code}/flag', function ($currency_code) {
    return getCurrencyFlag($currency_code);
})->name('get_flag');
