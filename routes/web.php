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

Route::get('/', 'Applicant\IndexController@index')->name('index');

Route::group(['middleware' => ['web']], function () {
    
    Route::group(['prefix' => 'applicant', 'middleware' => ['guestApplicants']], function () {
        
        Route::get('/login','Applicant\LoginController@showLoginForm')->name('applicant.login');
        Route::post('/login','Applicant\LoginController@login')->name('applicant.login');
        // Registration Routes...
        Route::get('/register', 'Applicant\RegisterController@showRegistrationForm')->name('applicant.register');
        Route::post('/register', 'Applicant\RegisterController@register')->name('applicant.register');
        // Password Reset Routes...
        Route::get('password/reset', 'Applicant\ForgotPasswordController@showLinkRequestForm')->name('applicant.password.request');
        Route::post('password/email', 'Applicant\ForgotPasswordController@sendResetLinkEmail')->name('applicant.password.email');
        Route::get('password/reset/{token}', 'Applicant\ResetPasswordController@showResetForm')->name('applicant.password.reset');
        Route::post('password/reset', 'Applicant\ResetPasswordController@reset');
        //Email Verification link sent to applicant after registration
        Route::get('email/verify/{email_activation_token}', 'Applicant\RegisterController@verifyEmail')->name('applicant.email.verify');
    });    

    //Authentication for applicants via applicants middleware
    //These are protected pages only an authenticated applicant can see
    Route::group(['middleware' => ['authenticatedApplicants']], function () {

        Route::get('/applicant/dashboard','Applicant\DashboardController@index')->name('applicant.dashboard');
        //Profile routes
        Route::get('/applicant/profile','Applicant\ProfileController@index')->name('applicant.profile.index');
        Route::get('/applicant/profile/edit','Applicant\ProfileController@showEditForm')->name('applicant.profile.edit');
        Route::post('/applicant/profile/edit','Applicant\ProfileController@edit')->name('applicant.profile.edit');
        Route::get('/applicant/profile/change-password','Applicant\ProfileController@showChangePasswordForm')->name('applicant.profile.changePassword');
        Route::post('/applicant/profile/change-password','Applicant\ProfileController@changePassword')->name('applicant.profile.changePassword');
        
        Route::get('/applicant/logout','Applicant\LoginController@logout')->name('applicant.logout');
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




