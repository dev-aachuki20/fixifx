<?php

use App\Http\Controllers\Admin\HomeController;
use App\Models\NewsLetter;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('admin.login');
});


Route::namespace('Auth')->group(function () {
    //Login Routes
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('admin-login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard',         'DashboardController@index')->name('home');
    Route::get('change-password',    'DashboardController@viewPassword')->name('change-password');
    Route::post('add-password',          'DashboardController@changePassword')->name('add-password');


    Route::get('menu', 'MenuController@menuList')->name('menu.list');
    Route::post('menu_get', 'MenuController@menuGet')->name('menu_get');
    Route::post('menu-add', 'MenuController@menuAdd')->name('menu.add');
    Route::patch('menu-change-status', 'MenuController@menuChangeStatus')->name('menu.change_status');

    Route::get('sub-menu', 'MenuController@subMenuList')->name('sub_menu.list');
    Route::post('submenu_get', 'MenuController@subMenuGet')->name('submenu_get');
    Route::post('sub-menu-add', 'MenuController@subMenuAdd')->name('sub_menu.add');
    Route::patch('sub-menu-change-status', 'MenuController@subMenuChangeStatus')->name('sub_menu.change_status');

    Route::get('menu-page', 'MenuController@menuPageList')->name('menu_page.list');
    Route::post('menu-page-add', 'MenuController@menuPageAdd')->name('menu_page.add');
    Route::patch('menu-page-change-status', 'MenuController@menuPageChangeStatus')->name('menu_page.change_status');
    Route::post('get_submenu', 'MenuController@getSubMenu')->name('menu_page.get_submenu');
    Route::post('menupage_get', 'MenuController@menuPageGet')->name('menupage_get');

    Route::get('authors/{id?}',         'BlogController@author')->name('blog_author');
    Route::post('add_author',           'BlogController@addAuthor')->name('add_author');
    Route::get('categories',            'BlogController@category')->name('blog_category');
    Route::post('add_category',         'BlogController@addcategory')->name('add_category');
    Route::get('banners',               'BlogController@banner')->name('blog_banner');
    Route::post('delete_article',       'BlogController@deleteArticle')->name('delete_article');


    Route::get('{slug}', 'HomeController@page')->name('page');
    Route::post('save_section/{sec_no}', 'HomeController@saveSection')->name('save_section');
    Route::post('upload-page-background/{slug}', 'HomeController@uploadPageBackground')->name('upload-page-background');
    Route::post('add-edit-faq', 'HomeController@addUpdateFaq')->name('add-edit-faq');
    Route::post('submit_multiple', 'HomeController@saveMultipleSection')->name('save_multiple_section');
    Route::post('save_payment_type', 'HomeController@savePaymentType')->name('save_payment_type');

    Route::get('article/{slug}/{article?}', 'HomeController@article')->name('article');
    Route::post('article',       'HomeController@articleSave')->name('article_save');
    Route::patch('article/change_status',       'HomeController@articleeChangeStatus')->name('article_change_status');

    Route::get('faq/{slug}', 'HomeController@faqPage')->name('faq_page');

    Route::get('setting', 'HomeController@setting')->name('setting');
    Route::post('update_setting', 'HomeController@updateSetting')->name('update_setting');
    Route::get('setting/category', 'HomeController@viewCategory')->name('setting.category');
    Route::post('category-delete', 'HomeController@deleteCategory')->name('category-delete');
    Route::get('setting/category-edit', 'HomeController@editCategory')->name('setting.category-edit');

    Route::post('share-category-delete', 'HomeController@deleteShareCategory')->name('share-category-delete');
    Route::get('setting/share-category-edit', 'HomeController@editShareCategory')->name('setting.share-category-edit');
    Route::get('setting/share-category', 'HomeController@viewShareCategory')->name('setting.share-category');
    Route::post('add_share_category',         'HomeController@addShareCategory')->name('add_share_category');

    Route::get('news-letter/list', 'HomeController@newsLetter')->name('news_letter');
    Route::get('contact-user/list', 'HomeController@contactUser')->name('contact_user');

    Route::post('add_spread/{id?}', 'HomeController@addUpdateSpread')->name('add_spread');
    Route::post('get_spread', 'HomeController@getSpread')->name('get_spread');
    Route::post('delete_spread', 'HomeController@deleteSpread')->name('delete_spread');

    // reward data table route
    Route::post('get_reward', 'HomeController@getReward')->name('get_reward');
    Route::post('add_reward/{id?}', 'HomeController@addUpdateReward')->name('add_reward');

    Route::post('add_share/{id?}', 'HomeController@addUpdateShare')->name('add_share');
    Route::post('add_forex/{id?}', 'HomeController@addUpdateForex')->name('add_forex');
    Route::post('add_cfd/{id?}', 'HomeController@addUpdateCfd')->name('add_cfd');
    Route::post('get_share', 'HomeController@getShare')->name('get_share');
    Route::post('get_forex', 'HomeController@getForex')->name('get_forex');
    Route::post('get_cfd', 'HomeController@getCfd')->name('get_cfd');
    Route::post('delete_share', 'HomeController@deleteShare')->name('delete_share');
    Route::post('delete_forex', 'HomeController@deleteForex')->name('delete_forex');
    Route::post('delete_cfd', 'HomeController@deleteCfd')->name('delete_cfd');

    Route::get('vps-user/list', 'HomeController@vpsUser')->name('vps_user');

    // get menu page
    Route::post('get_menu_page', 'MenuController@getMenuPage')->name('get_menu_page');
});
