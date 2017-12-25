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

Route::get('/', 'site@index')->name('Home');
Route::get('/closed-bids/{backTo}', 'site@filter_closed')->name('Closed bids');
Route::get('/open-bids/{backTo}', 'site@filter_open')->name('Open bids');
Route::get('/all-bids/{backTo}', 'site@filter_all')->name('All bids');
Route::get('/sort-projects/{backTo}', 'site@sort')->name('All bids');
Route::get('/sort-providers', 'site@sort_providers')->name('Bidders sorting');
Route::get('/projects','site@projects_display')->name('All Projects');
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
Route::get('/about-us', function () {
    return view('about-us');
})->name('About Us');
Route::get('/new-project', function () {
    return view('new-project.new-project');
})->name('New Project')->middleware('client');

Route::get('/sign-up', function () {
    return view('client-register');
})->name('Sign Up');
Route::get('/service-provider-sign-up', function () {
    return view('new-provider.bidder-register');
})->name('New Bidder Sign Up');
Route::get('/service-provider-subscription', function () {
    return view('new-provider.bidder-register-subscription-details');
})->name('Bidder subscription')->middleware('auth');
Route::get('/new-provider-company', function () {
    return view('new-provider.bidder-register-company-details');
})->name('New Company Details')->middleware('auth');

Route::get('/forgot-pass', function () {
    return view('auth.forgotPass');
})->name('Forgot Password');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/home', '/', 301);
Route::redirect('/register', '/sign-up', 301);
Route::post('/sign-up', 'clients@create')->name('create_client');
Route::get('register/verify/{token}','Auth\RegisterController@verify')->name('Email Verification');//verify email addresses
Route::get('/profile','admin@profile')->name('profile')->middleware('auth');
Route::get('/client-user-profile','clients@client_profile')->name('client_profile')->middleware('auth');
Route::get('/client-public-profile/{client_id}','clients@client_public_profile')->name('Client Profile');
Route::get('/client-alerts','clients@alerts')->name('Client Alerts')->middleware('auth');
Route::put('/update-basic-details','admin@update_basic_details')->name('Basic Details Update')->middleware('auth');
Route::put('/update-personal-details','admin@update_personal_details')->name('Personal Details Update')->middleware('auth');
Route::put('/update-password-change','admin@update_password_change')->name('Password Update')->middleware('auth');
Route::put('/update-contact-details','admin@update_contact_details')->name('Contact Details Update')->middleware('auth');
Route::get('/delete-account', 'admin@delete_account')->name('delete Account')->middleware('auth');
Route::post('/provider-registration', 'providers@create')->name('create New Provider');
Route::get('register/provider-verify/{token}','Auth\RegisterController@provider_verify')->name('Email Validation');//verify provideremail addresses
Route::post('/provider-company-registration', 'providers@create_provider_company')->name('provider_company')->middleware('auth');
Route::post('/provider-membership', 'providers@provider_membership')->name('provider membership')->middleware('auth');
Route::get('/provider-company-registration-back', 'providers@create_provider_company_back')->name('provider company back')->middleware('auth');
Route::put('/provider-company-registration-update', 'providers@update_provider_company')->name('provider company update')->middleware('auth');
Route::get('/service-provider-sign-up-back', 'providers@create_provider_back')->name('sign up update_success')->middleware('auth');
Route::put('/provider-registration-update', 'providers@provider_registration_update')->name('provider sign up update')->middleware('auth');

/*Route::get('/payment-basic-sucess','providers@payment_basic_sucess')->name('Basic Sucess')->middleware('auth');
Route::get('/payment-basic-aborted','providers@payment_basic_aborted')->name('Basic Aborted')->middleware('auth');
Route::get('/payment-silver-sucess','providers@payment_silver_sucess')->name('Silver Sucess')->middleware('auth');
Route::get('/payment-silver-aborted','providers@payment_silver_aborted')->name('silver Aborted')->middleware('auth');
Route::get('/payment-gold-sucess','providers@payment_gold_sucess')->name('Gold Sucess')->middleware('auth');
Route::get('/payment-gold-aborted','providers@payment_gold_aborted')->name('Gold Aborted')->middleware('auth');*/
//provider
Route::get('/provider-user-profile','providers@provider_profile')->name('Provider Profile')->middleware('auth');
Route::get('/provider-company','admin@company_details')->name('Company Details')->middleware('auth');
Route::put('/incorp-details', 'providers@update_company_incorp_details')->name('Incorp details update')->middleware('auth');
Route::put('/contacts-update', 'providers@company_contacts_update')->name('company contacts update')->middleware('auth');
Route::put('/company-promotion-update', 'providers@update_company_promotion')->name('company promotion update')->middleware('auth');
Route::get('/provider-membership','providers@membership')->name('Bidder Membership')->middleware('provider');
Route::get('/provider-chats','providers@chats')->name('Provider Chats')->middleware('auth');
Route::get('/provider-alerts','providers@alerts')->name('Provider Alerts')->middleware('auth');
Route::get('/provider-profile/{provider_id}','providers@public_profile')->name('Bidder Profile');
Route::get('/provider-renew-membership','providers@renew_membership')->name('Membership Renewal')->middleware('provider');
//Projects
Route::post('/new-project', 'projects@create')->name('Create Project')->middleware('client');
Route::get('/project-basic-back/{id}','projects@basic_back')->name('Back to basic')->middleware('auth');
Route::put('/new-project-basic-update', 'projects@project_basic_update')->name('project basic update')->middleware('client');
Route::post('/new-project-features', 'projects@project_features_create')->name('Project Features')->middleware('client');
Route::get('/new-project-features-back','projects@new_project_features_back')->name('Back to features')->middleware('client');
Route::post('/new-project-schedule', 'projects@project_schedule_create')->name('Project Schedule')->middleware('client');
Route::get('/new-project-schedule','projects@new_project_schedule_form')->name('Project schedule form')->middleware('client');
Route::get('/new-project-features','projects@new_project_features_form')->name('Project Features Form')->middleware('client');
Route::put('/quick-new-project', 'projects@quick_new_project')->name('New Project')->middleware('client');
Route::get('/load-project-details','dynamic@project_details')->name('Dynamic project loading');
Route::get('/project-details/{project_id}','projects@single_project_details')->name('single project details');
Route::put('/project-title-schedule-update', 'projects@project_title_schedule_update')->name('Schedule title update')->middleware('auth');
Route::put('/project-features-update', 'projects@project_features_update')->name('Features update')->middleware('auth');
Route::put('/project-tech-features-update', 'projects@project_tech_features_update')->name('Tech Features update')->middleware('auth');
Route::put('/project-caption-update', 'projects@project_caption_update')->name('caption update')->middleware('auth');
Route::post('/project-delete', 'projects@project_delete')->name('project_delete')->middleware('auth');
Route::get('/provider-controls', 'admin@provider_controls')->name('Provider view controls')->middleware('auth');
//bids
Route::post('/place-bid', 'bids@create')->name('Create Bid')->middleware('provider');
Route::get('/bidder-select/{bid_id}', 'bids@close')->name('Close bid');
//enquiries
Route::post('/make-enquiry', 'site@enquiry')->name('Enquiry');
//alerts
Route::post('/alerts', 'site@set_alerts')->name('Site Alerts');
//housekeeper
Route::get('/housekeeper', 'site@housekeeper')->name('House Keeper');
//client chatting up a provider
Route::get('/chat-up', 'dynamic@chat_up')->middleware('client');
Route::get('/chat-messages', 'dynamic@chat_messages')->middleware('auth');
Route::get('/new-chat-messages', 'dynamic@new_chat_messages')->middleware('auth');
Route::get('/pull-chat-messages', 'dynamic@pull_chat_messages')->middleware('auth');
Route::get('/load-contacts', 'dynamic@load_contacts')->middleware('auth');
Route::get('/check-new-messages', 'dynamic@check_new_messages')->middleware('auth');
//identify online users
Route::get('/user-online-activity', 'dynamic@user_online_activity')->middleware('auth');
