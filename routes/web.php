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

Route::get('/', 'IndexController@index')->name('index');

Route::group(['middleware' => ['web']], function () {
    
    Route::group(['prefix' => 'applicant', 'middleware' => ['guestApplicants']], function () {
        
        Route::get('/login','Applicants\ApplicantsLoginController@showLoginForm')->name('applicant.login');
        Route::post('/login','Applicants\ApplicantsLoginController@login')->name('applicant.login');
        // Registration Routes...
        Route::get('/register', 'Applicants\ApplicantsRegisterController@showRegistrationForm')->name('applicant.register');
        Route::post('/register', 'Applicants\ApplicantsRegisterController@register')->name('applicant.register');
        // Password Reset Routes...
        Route::get('password/reset', 'Applicants\ApplicantsForgotPasswordController@showLinkRequestForm')->name('applicant.password.request');
        Route::post('password/email', 'Applicants\ApplicantsForgotPasswordController@sendResetLinkEmail')->name('applicant.password.email');
        Route::get('password/reset/{token}', 'Applicants\ApplicantsResetPasswordController@showResetForm')->name('applicant.password.reset');
        Route::post('password/reset', 'Applicants\ApplicantsResetPasswordController@reset');
        //Email Verification link sent to applicant after registration
        Route::get('email/verify/{email_activation_token}', 'Applicants\ApplicantsRegisterController@verifyEmail')->name('applicant.email.verify');
    });    

    //Authentication for applicants via applicants middleware
    //These are protected pages only an authenticated applicant can see
    Route::group(['middleware' => ['authenticatedApplicants']], function () {

        Route::get('/applicant/dashboard','Applicants\ApplicantsDashboardController@index')->name('applicant.dashboard');
        //    Route::get('/applicant', 'AdminController@index');
        Route::get('/applicant/logout','Applicants\ApplicantsLoginController@logout')->name('applicant.logout');
    });
    
    
    Route::group(['prefix' => 'admin'], function () {
        //User Authentication Routes i.e admin
        Auth::routes();
        
        //Apply auth Middleware to protect Admin pages
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/dashboard','AdminDashboardController@index')->name('admin.dashboard');
        });
    });
    
});




