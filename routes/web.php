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
})->middleware('auth');
Route::get('/new-provider-company', function () {
    return view('new-provider.bidder-register-company-details');
})->middleware('auth');
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
Route::get('/client-user-profile','clients@client_profile')->name('client_profile')->middleware('auth');
Route::put('/update-basic-details','admin@update_basic_details')->name('Basic_details_update')->middleware('auth');
Route::put('/update-personal-details','admin@update_personal_details')->name('Personal_details_update')->middleware('auth');
Route::put('/update-password-change','admin@update_password_change')->name('Password_update')->middleware('auth');
Route::put('/update-contact-details','admin@update_contact_details')->name('Contact_details_update')->middleware('auth');
Route::get('/delete-account', 'admin@delete_account')->name('delete_account')->middleware('auth');
Route::post('/provider-registration', 'providers@create')->name('create_provider');
Route::get('register/provider-verify/{token}','Auth\RegisterController@provider_verify');//verify provideremail addresses
Route::post('/provider-company-registration', 'providers@create_provider_company')->name('provider_company')->middleware('auth');
Route::post('/provider-membership', 'providers@provider_membership')->name('provider membership')->middleware('auth');
Route::get('/provider-company-registration-back', 'providers@create_provider_company_back')->name('provider company back')->middleware('auth');
Route::put('/provider-company-registration-update', 'providers@update_provider_company')->name('provider company update')->middleware('auth');
Route::get('/service-provider-sign-up-back', 'providers@create_provider_back')->name('sign up update_success')->middleware('auth');
Route::put('/provider-registration-update', 'providers@provider_registration_update')->name('provider sign up update')->middleware('auth');
Route::get('/payment-basic-sucess','providers@payment_basic_sucess')->name('Basic Sucess')->middleware('auth');
Route::get('/payment-basic-aborted','providers@payment_basic_aborted')->name('Basic Aborted')->middleware('auth');
Route::get('/payment-silver-sucess','providers@payment_silver_sucess')->name('Silver Sucess')->middleware('auth');
Route::get('/payment-silver-aborted','providers@payment_silver_aborted')->name('silver Aborted')->middleware('auth');
Route::get('/payment-gold-sucess','providers@payment_gold_sucess')->name('Gold Sucess')->middleware('auth');
Route::get('/payment-gold-aborted','providers@payment_gold_aborted')->name('Gold Aborted')->middleware('auth');
//provider
Route::get('/provider-user-profile','providers@provider_profile')->name('Provider Profile')->middleware('auth');
Route::get('/provider-company','admin@company_details')->name('Company Details')->middleware('auth');
Route::put('/incorp-details', 'providers@update_company_incorp_details')->name('Incorp details update')->middleware('auth');
Route::put('/contacts-update', 'providers@company_contacts_update')->name('company contacts update')->middleware('auth');
Route::put('/company-promotion-update', 'providers@update_company_promotion')->name('company promotion update')->middleware('auth');
Route::get('/provider-membership','providers@membership')->name('Provider Membership')->middleware('auth');
Route::get('/provider-chats','providers@chats')->name('Provider Chats')->middleware('auth');
