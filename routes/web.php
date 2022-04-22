<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserType;

use App\Http\Controllers\Jobs;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Employer;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\LinkedInController;
use App\Http\Controllers\TestController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/signup', [HomeController::class, 'signup']);
Route::get('/signup-company', [HomeController::class, 'signup_company']);
Route::get('/signup-consultant', [HomeController::class, 'signup_consultant']);
Route::get('/get_city', [HomeController::class, 'get_city_by_state_id'])->name('get_city_by_state_id');
Route::get('/signup-person', [HomeController::class, 'signup_person']);
Route::get('/signup-jobs', [HomeController::class, 'signup_jobs']);
Route::post('/company', [HomeController::class, 'company']);
Route::post('/consultant-registration', [HomeController::class, 'consultant_registration']);

Route::post('/job', [HomeController::class, 'job']);

/*** Frontend Job url ***/
// Route::get('/jobs-frontend', [HomeController::class, 'jobs_frontend']);
// Route::post('/jobs-frontend', [HomeController::class, 'jobs_frontend']);
// Route::get('/jobs-frontend-search', [HomeController::class, 'jobs_frontend_search']);
// Route::get('/jobs-frontend-detail/{job_slug}', [HomeController::class, 'jobs_frontend_detail']);

Route::get('/login-as-employer-or-jobseeker', [HomeController::class, 'login_as_employer_or_jobseeker']);
Route::get('/employer-login', [HomeController::class, 'employer_login']);

Route::get('/job-login', [HomeController::class, 'job_login']);
Route::post('/empcheck', [HomeController::class, 'empcheck'])->name('empcheck');
Route::post('/jobcheck', [HomeController::class, 'jobcheck'])->name('jobcheck');
Route::post('/verify_job_otp', [HomeController::class, 'verify_job_otp'])->name('verify_job_otp');

Route::get('/forget_password', [HomeController::class, 'forget_password'])->name('forget_password');
Route::post('/submit_forget_password', [HomeController::class, 'submit_forget_password'])->name('submit_forget_password');
Route::get('/check_email_exists_in_users', [HomeController::class, 'check_email_exists_in_users'])->name('check_email_exists_in_users');
Route::get('/check_mobile_number_exists_in_users', [HomeController::class, 'check_mobile_number_exists_in_users'])->name('check_mobile_number_exists_in_users');

Route::post('/user-subscriber', [HomeController::class, 'user_subscriber'])->name('user_subscriber');
Route::get('/email-verification/{email}', [HomeController::class, 'email_verification']);

Route::get('/admin_login', [Admin::class, 'admin_login']);
Route::post('/check_admin', [Admin::class, 'check_admin'])->name("check_admin");

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name("auth_gogole");
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name("google_auth_callback");

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name("auth_facebook");
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback'])->name("facebook_auth_callback");

Route::get('auth/linkedin', [LinkedInController::class, 'redirectToLinkedin'])->name("auth_linkedin");
Route::get('auth/linkedin/callback', [LinkedInController::class, 'handleLinkedinCallback'])->name("linkedin_auth_callback");

Route::view('/faq', 'faq');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::middleware(['auth', 'checkUserType:3'])->group(function () {
    Route::get('/admin', [Admin::class, 'inactive']);
    Route::get('/inactive', [Admin::class, 'inactive']);
    Route::get('/active', [Admin::class, 'active']);
    Route::get('/detail/{id}', [Admin::class, 'detail']);
    Route::get('/inactivestatus/{id}', [Admin::class, 'inactivestatus']);
    Route::get('/users', [Admin::class, 'users']);
    Route::get('/plans', [Admin::class, 'plans']);
    Route::get('/add_plan', [Admin::class, 'add_plan']);
    Route::post('/save_plan', [Admin::class, 'save_plan']);
    Route::delete('/delete_plan/{id}', [Admin::class, 'delete_plan'])->name('delete_plan');
    Route::get('/edit_plan', [Admin::class, 'edit_plan'])->name('edit_plan');
    Route::post('/update_plan/{id}', [Admin::class, 'update_plan'])->name('update_plan');
});

Route::middleware(['auth', 'checkUserType:0,1,4'])->group(function () {
    Route::get('/employer-edit-post/{job_slug}', [Employer::class, 'employereditpost']);
    Route::post('/frompost', [Employer::class, 'frompost']);
    Route::get('/employer-job-listing/{job_slug}', [Employer::class, 'employer_job_listing']);
    Route::get('/inactive-jobs', [Employer::class, 'inactive_jobs']);
    Route::get('/employer-dashboard', [Employer::class, 'employer_dashboard']);
    Route::get('/employereditprofile', [Employer::class, 'employereditprofile']);
    Route::post('/employerupdateprofile', [Employer::class, 'employerupdateprofile']);

    Route::get('/activate-inactive-job/{job_slug}', [Employer::class, 'activate_inactive_job']);

    Route::get('/active-jobs', [Employer::class, 'active_jobs']);
    Route::get('/candidate-job/{job_slug}', [Employer::class, 'candidate_job']);
    Route::get('/candidate-detail/{job_slug}/{user_id}', [Employer::class, 'candidate_detail']);

    Route::get('/employerviewprofile', [Employer::class, 'employerviewprofile']);
    Route::get('/employer-post-job', [Employer::class, 'employer_post_job']);
    Route::post('/update-job-post/{id}', [Employer::class, 'update_job_post']);
    Route::get('/employer-delete-post/{id}', [Employer::class, 'employer_delete_post']);
    Route::get('/employer-repost-job/{id}', [Employer::class, 'employer_repost_job']);

    Route::get('/employer-copy-post/{id}', [Employer::class, 'employer_copy_post']);

    Route::get('/subscription_plan', [Employer::class, 'subscription_plan']);
    Route::post('/save_subscription_plan/{id}', [Employer::class, 'save_subscription_plan'])->name('save_subscription_plan');
});

Route::get('/jobs',[Jobs::class,'jobs']);
Route::get('/jobs-detail/{job_slug}',[Jobs::class,'jobs_detail']);
Route::get('/search',[Jobs::class,'search']);
Route::middleware(['auth', 'checkUserType:2'])->group(function () {
    Route::get('/jobs-dashboard', [Jobs::class, 'jobs_dashboard']);
    // Route::get('/jobs', [Jobs::class, 'jobs']);
    Route::post('/jobs', [Jobs::class, 'jobs']);
    Route::get('/jobs-applied', [Jobs::class, 'jobs_applied']);
    Route::get('/jobs-saved-jobs', [Jobs::class, 'jobs_saved_jobs']);
    // Route::get('/jobs-detail/{job_slug}', [Jobs::class, 'jobs_detail']);
    Route::get('/jobsviewprofile', [Jobs::class, 'jobsviewprofile']);
    Route::get('/jobseditprofile', [Jobs::class, 'jobseditprofile']);
    Route::post('/jobsupdateprofile', [Jobs::class, 'jobsupdateprofile']);
    // Route::get('/search', [Jobs::class, 'search']);
});

Route::get('/test', [TestController::class, 'test']);
Route::get('/sms-test', [TestController::class, 'sms_test']);