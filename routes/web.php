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
Route::get('/provider', function () {
    return view('admin.provider.top');
});
Route::get('/sys', function () {
    return view('admin.sys.top');
});
Route::get('/client-profile', function () {
    return view('admin.client.top');
});
Route::get('/client-subscription', function () {
    return view('admin.client.subscription');
});
Route::get('/client-bidders', function () {
    return view('admin.client.bidders');
});
Route::get('/client-users', function () {
    return view('admin.client.users');
});
Route::get('/client-reports', function () {
    return view('admin.client.reports');
});
Route::get('/client-campaigns', function () {
    return view('admin.client.campaigns');
});
Route::get('/client-chats', function () {
    return view('admin.client.chat');
});
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/about-us', function () {
    return view('about-us');
});
Route::get('/new-project', function () {
    return view('new-project.new-project');
});
Route::get('/new-project-features', function () {
    return view('new-project.new-project-features');
});
Route::get('/new-project-schedule', function () {
    return view('new-project.new-project-schedule');
});
Route::get('/sign-up', function () {
    return view('client-register');
});
Route::get('/service-provider-sign-up', function () {
    return view('new-provider.bidder-register');
});
Route::get('/service-provider-subscription', function () {
    return view('new-provider.bidder-register-subscription-details');
});
Route::get('/new-provider-company', function () {
    return view('new-provider.bidder-register-company-details');
});
Route::get('/project-details/{project_id}', function () {
    return view('project-details');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/home', '/', 301);
Route::redirect('/register', '/sign-up', 301);
Route::post('/sign-up', 'clients@create')->name('create_client');
Route::get('register/verify/{token}','Auth\RegisterController@verify');//verify email addresses
Route::get('/profile','admin@profile')->name('profile')->middleware('auth');
Route::get('/client-user-profile','admin@client_profile')->name('client_profile')->middleware('auth');
