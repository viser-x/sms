<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
    return view('login');
});



Auth::routes();

Route::prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/edit-profile', [ProfileController::class, 'editProfile'])->name('edit.profile');
    Route::post('/edit-profile', [ProfileController::class, 'updateProfile'])->name('edit.profile');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change.password');
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');


    Route::get('/add-group', [GroupController::class, 'addGroup'])->name('add.group');
    Route::post('/add-group', [GroupController::class, 'store'])->name('add.group');
    Route::get('/manage-group', [GroupController::class, 'manageGroup'])->name('manage.group');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('edit');
    Route::post('/update-group', [GroupController::class, 'updateGroup'])->name('update.group');
    Route::get('/delete/{id}', [GroupController::class, 'delete'])->name('delete');


    Route::get('/single-message', [ServiceController::class, 'singleMessage'])->name('single.message');
    Route::get('/multiple-message', [ServiceController::class, 'multipleMessage'])->name('multiple.message');
    Route::post('/single-message', [ServiceController::class, 'store'])->name('single-message');
    // Route::post('/multiple-message', [ServiceController::class, 'store'])->name('multiple-message');
    Route::get('/group-members/{id}', [ServiceController::class, 'groupMembers'])->name('group.members');


    Route::get('/message-history', [ServiceController::class, 'messageHistory'])->name('message.history');
    Route::get('/message-info', [ServiceController::class, 'messageInfo'])->name('message.info');


    Route::get('/add-member', [MemberController::class, 'addMember'])->name('add.member');
    Route::get('/manage-member', [MemberController::class, 'manageMember'])->name('manage.member');
    Route::post('/add-member', [MemberController::class, 'store'])->name('add.member');
    Route::get('/edit-member/{id}', [MemberController::class, 'editMember'])->name('edit.member');
    Route::post('/update-member', [MemberController::class, 'updateMember'])->name('update.member');
    Route::get('/delete-member/{id}', [MemberController::class, 'deleteMember'])->name('delete.member');
    Route::get('/search', [MemberController::class, 'search'])->name('search');


    Route::get('/buy-message', [AccountController::class, 'buyMessage'])->name('buy.message');
});
