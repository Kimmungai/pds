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
    return view('bidder-register');
});
Route::get('/user-login', function () {
    return view('user-login');
});
Route::get('/project-details/{project_id}', function () {
    return view('project-details');
});
