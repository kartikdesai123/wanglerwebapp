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

Route::match(['get', 'post'], '/', ['as' => 'home', 'uses' => 'frontend\HomeController@index']);
Route::match(['get', 'post'], 'gallay', ['as' => 'gallay', 'uses' => 'frontend\GallayController@index']);
Route::match(['get', 'post'], 'history', ['as' => 'history', 'uses' => 'frontend\HistoryController@index']);
Route::match(['get', 'post'], 'about_us/{id}', ['as' => 'about_us', 'uses' => 'frontend\About_UsController@index']);
Route::match(['get', 'post'], 'getpage', ['as' => 'getpage', 'uses' => 'frontend\About_UsController@getPageList']);
Route::match(['get', 'post'], 'newsdetails/{id}', ['as' => 'newsdetails', 'uses' => 'frontend\NewsController@newsdetails']);
Route::match(['get', 'post'], 'videos', ['as' => 'videos', 'uses' => 'frontend\VideoController@index']);

Route::match(['get', 'post'], 'product', ['as' => 'product', 'uses' => 'frontend\ProductController@index']);
Route::match(['get', 'post'], 'productdetails/{id}', ['as' => 'productdetails', 'uses' => 'frontend\ProductController@details']);
Route::match(['get', 'post'], 'product-ajaxAction', ['as' => 'product-ajaxAction', 'uses' => 'frontend\ProductController@ajaxAction']);

Route::match(['get', 'post'], 'retailstores', ['as' => 'retailstores', 'uses' => 'frontend\RetailstoresController@index']);
Route::match(['get', 'post'], 'retailstores-ajaxAction', ['as' => 'retailstores-ajaxAction', 'uses' => 'frontend\RetailstoresController@ajaxAction']);

Route::match(['get', 'post'], 'news', ['as' => 'news', 'uses' => 'frontend\NewsController@index']);
Route::match(['get', 'post'], 'contact-us', ['as' => 'contact-us', 'uses' => 'frontend\ContactusController@index']);
Route::match(['get', 'post'], 'page-ajaxAction-new', ['as' => 'page-ajaxAction-new', 'uses' => 'backend\pages\PagesController@ajaxAction']);


Route::match(['get', 'post'], 'admin', ['as' => 'admin', 'uses' => 'backend\LoginController@login']);
Route::match(['get', 'post'], 'logout', ['as' => 'logout', 'uses' => 'backend\LoginController@getLogout']);
$adminPrefix = "";
Route::group(['prefix' => $adminPrefix, 'middleware' => ['admin']], function() {

    Route::match(['get', 'post'], 'admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'backend\dashboard\DashboardController@dashboard']);
    Route::match(['get', 'post'], 'ckeditor', ['as' => 'ckeditor', 'uses' => 'backend\ckeditor\CkeditorController@ckeditor']);
    Route::match(['get', 'post'], 'imageeditor', ['as' => 'imageeditor', 'uses' => 'backend\imageeditor\ImageeditorController@imageeditor']);

//    Admin Setting
    Route::match(['get', 'post'], 'profile', ['as' => 'profile', 'uses' => 'backend\adminsetting\AdminsettingController@profile']);
	Route::match(['get', 'post'], 'color-change', ['as' => 'color-change', 'uses' => 'backend\adminsetting\AdminsettingController@colorChange']);
    
	Route::match(['get', 'post'], 'changepassword', ['as' => 'changepassword', 'uses' => 'backend\adminsetting\AdminsettingController@changepassword']);


//    Products
    Route::match(['get', 'post'], 'manage-product', ['as' => 'manage-product', 'uses' => 'backend\product\ProductController@manageproduct']);
    Route::match(['get', 'post'], 'add-product', ['as' => 'add-product', 'uses' => 'backend\product\ProductController@addproduct']);
    Route::match(['get', 'post'], 'edit-product', ['as' => 'edit-product', 'uses' => 'backend\product\ProductController@editproduct']);

    Route::match(['get', 'post'], 'category', ['as' => 'category', 'uses' => 'backend\product\ProductController@category']);
    Route::match(['get', 'post'], 'manageproduct-ajaxAction', ['as' => 'manageproduct-ajaxAction', 'uses' => 'backend\product\ProductController@ajaxAction']);
    Route::match(['get', 'post'], 'edit-category', ['as' => 'edit-category', 'uses' => 'backend\product\ProductController@editcategory']);


    //    Pages
    Route::match(['get', 'post'], 'pages', ['as' => 'pages', 'uses' => 'backend\pages\PagesController@index']);
    Route::match(['get', 'post'], 'addpages', ['as' => 'addpages', 'uses' => 'backend\pages\PagesController@addpages']);
    Route::match(['get', 'post'], 'editpages/{id}', ['as' => 'editpages', 'uses' => 'backend\pages\PagesController@editpages']);
    Route::match(['get', 'post'], 'page-ajaxAction', ['as' => 'page-ajaxAction', 'uses' => 'backend\pages\PagesController@ajaxAction']);


//    Silder 
    Route::match(['get', 'post'], 'silder', ['as' => 'silder', 'uses' => 'backend\silder\SilderController@index']);
    Route::match(['get', 'post'], 'editsilder', ['as' => 'editsilder', 'uses' => 'backend\silder\SilderController@editsilder']);
    Route::match(['get', 'post'], 'silder-ajaxAction', ['as' => 'silder-ajaxAction', 'uses' => 'backend\silder\SilderController@ajaxAction']);


//    News 
    Route::match(['get', 'post'], 'admin-news', ['as' => 'admin-news', 'uses' => 'backend\news\NewsController@index']);
    Route::match(['get', 'post'], 'addnews', ['as' => 'addnews', 'uses' => 'backend\news\NewsController@addnews']);
    Route::match(['get', 'post'], 'editnews/{id}', ['as' => 'editnews', 'uses' => 'backend\news\NewsController@editnews']);
    Route::match(['get', 'post'], 'news-ajaxAction', ['as' => 'news-ajaxAction', 'uses' => 'backend\news\NewsController@ajaxaction']);

//    Stores 
    Route::match(['get', 'post'], 'manage-city', ['as' => 'manage-city', 'uses' => 'backend\stores\StoresController@managecity']);
    Route::match(['get', 'post'], 'editcity', ['as' => 'editcity', 'uses' => 'backend\stores\StoresController@editcity']);
    Route::match(['get', 'post'], 'city-ajaxAction', ['as' => 'city-ajaxAction', 'uses' => 'backend\stores\StoresController@ajaxaction']);

//  Hours
    
    Route::match(['get', 'post'], 'manage-store-hours', ['as' => 'manage-store-hours', 'uses' => 'backend\stores\StoresController@storeHours']);

    Route::match(['get', 'post'], 'stores', ['as' => 'stores', 'uses' => 'backend\stores\StoresController@stores']);
    Route::match(['get', 'post'], 'editseller', ['as' => 'editseller', 'uses' => 'backend\stores\StoresController@editseller']);

//    gallay-image
    Route::match(['get', 'post'], 'gallay-image', ['as' => 'gallay-image', 'uses' => 'backend\gallayimage\GallayimageController@index']);
    Route::match(['get', 'post'], 'editgallay', ['as' => 'editgallay', 'uses' => 'backend\gallayimage\GallayimageController@editgallay']);
    Route::match(['get', 'post'], 'gallay-ajaxAction', ['as' => 'gallay-ajaxAction', 'uses' => 'backend\gallayimage\GallayimageController@ajaxAction']);


//    video
    Route::match(['get', 'post'], 'admin-video', ['as' => 'admin-video', 'uses' => 'backend\video\VideoController@index']);
    Route::match(['get', 'post'], 'video-ajaxAction', ['as' => 'video-ajaxAction', 'uses' => 'backend\video\VideoController@ajaxAction']);
    
});
