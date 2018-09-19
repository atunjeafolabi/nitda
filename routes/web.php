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
    
    Route::group(['prefix' => 'applicant'], function () {
        
        Route::group(['middleware' => ['guestApplicants']], function () {

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

            Route::get('/dashboard','Applicant\DashboardController@index')->name('applicant.dashboard');
            //Profile routes
            Route::get('profile','Applicant\ProfileController@index')->name('applicant.profile.index');
            Route::get('profile/edit','Applicant\ProfileController@showEditForm')->name('applicant.profile.edit');
            Route::post('profile/edit','Applicant\ProfileController@edit')->name('applicant.profile.edit');
            Route::get('profile/change-password','Applicant\ProfileController@showChangePasswordForm')->name('applicant.profile.changePassword');
            Route::post('profile/change-password','Applicant\ProfileController@changePassword')->name('applicant.profile.changePassword');
            Route::get('logout','Applicant\LoginController@logout')->name('applicant.logout');
            //Academic Records Routes
            Route::get('academic-records', 'Applicant\AcademicRecordsController@index')->name('academic-records.index');
            Route::post('academic-records/add-olevel', 'Applicant\AcademicRecordsController@addOLevel')->name('academic-records.addOLevel');
            Route::delete('academic-records/delete-olevel/{id}', 'Applicant\AcademicRecordsController@deleteOLevel')->name('academic-records.deleteOLevel');
            
            //Job Routes
            Route::get('job/{job_id}','Applicant\JobController@show')->name('job.show');

            

        });
    });
    
    //==================== ADMIN ROUTES ============================
    Route::group(['prefix' => 'admin'], function () {
        //User Authentication Routes i.e admin
        Auth::routes();
        
        //Apply auth Middleware to protect Admin pages
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/dashboard','AdminDashboardController@index')->name('admin.dashboard');
        });
    });
    
});




