<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'homepage'])->name('account.home');
Route::get('aboutus', [UserController::class, "aboutuspage"])->name('account.aboutus');
Route::get('contactus', [UserController::class, 'contactuspage'])->name('account.contactus');

Route::group(['prefix' => 'account'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [UserController::class, 'loginpage'])->name('account.loginpage');
        Route::get('register', [UserController::class, 'registerpage'])->name('account.registerpage');
        Route::post('user/register', [LoginController::class, 'register'])->name('account.register');
        Route::post('user/login', [LoginController::class, 'login'])->name('account.login');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('account.dashboard');
        Route::get('Donate/{id}/{bloodgroup}',[UserController::class,'donorpage'])->name('account.donorpage');
        Route::get('bloodrequest',[UserController::class,'requestbloodpage'])->name('account.bloodrequestpage');
        Route::get('bloodstock',[UserController::class,'bloodstockspage'])->name('account.bloodstocks');
        Route::get('events',[UserController::class,'eventspage'])->name('account.eventpage');
        Route::get('logout',[LoginController::class,'logout'])->name('account.logout');
        Route::post('donor_registration/{id}',[UserController::class,'donor_reg'])->name('account.donor_registration');
        Route::post('BloodRequest',[UserController::class,'blood_req'])->name('account.bloodrequest_reg');
        Route::get('profile',[UserController::class,'profilepage'])->name('account.profile');
        Route::get('Require',[UserController::class,'donNeedpage'])->name('account.peopleinneed');
        Route::get('company_donation',[UserController::class,'companydonatepage'])->name('account.companydonationpage');
        Route::post('company_donate',[UserController::class,'company_donation'])->name('account.company_donate');
        Route::get('ApplyEventPage',[UserController::class,'addeventpage'])->name('account.applyeventpage');
        Route::post('addevent',[UserController::class,'addevent'])->name('account.addevent');
        Route::post('joinevent/{id}', [UserController::class, 'joinevent'])->name('account.joinevent');
        Route::delete('cancelevent/{id}',[UserController::class,'cancelevent'])->name('account.cancelevent');
    });
});

Route::group(['prefix'=>'admin'],function(){
    Route::group(['middleware'=>'admin.guest'],function(){
        Route::get('login',[AdminController::class,'loginpage'])->name('admin.loginpage');
        Route::post('in',[AdminLoginController::class,'login'])->name('admin.login');
    });
    Route::group(['middleware'=>'admin.auth'],function(){
        Route::get('dashboard',[AdminController::class,'dash'])->name('admin.dashboard');
        Route::get('donors',[AdminController::class,'donorspage'])->name('admin.donorspage');
        Route::get('bloodrequestlist',[AdminController::class,'bloodreqpage'])->name('admin.bloodrequestspage');
        Route::get('DonorRequestlist',[AdminController::class,'dorequestpage'])->name('admin.dorequestpage');
        Route::get('bloodstocklist',[AdminController::class,'bloodstockspage'])->name('admin.bloodstocklist');
        Route::get('eventlist',[AdminController::class,'eventspage'])->name('admin.eventlists');
        Route::post('addevent',[AdminController::class,''])->name('admin.addevent');
        Route::get('addeventpage',[AdminController::class,'addEventpage'])->name('admin.addEventpage');
        Route::get('addbloodpage',[AdminController::class,'addBloodstockpage'])->name('admin.addbloodpage');
        Route::post('addblood',[AdminController::class,'addBloodstock'])->name('admin.addblood');
        Route::get('approveBloodreq/{id}',[AdminController::class,'approveBloodreq'])->name('admin.approvebloodreq');
        Route::delete('cancelbloodreq/{id}',[AdminController::class,'cancelBloodreq'])->name('admin.cancelBloodreq');
        Route::get('approveEvent/{id}',[AdminController::class,'approveevent'])->name('admin.approveevent');
        Route::delete('cancelevent/{id}',[AdminController::class,'cancelevent'])->name('admin.cancelevent');
        Route::get('logout',[AdminLoginController::class,'logout'])->name('admin.logout');
    });
});
