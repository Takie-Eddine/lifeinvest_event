<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

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


    Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {

        Route::get('login', [LoginController::class, 'login'])->name('admin.login');
        Route::post('login', [LoginController::class, 'postLogin'])->name('admin.post.login');
    });


    Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'admin'],function(){

        Route::get('/' , [AdminController::class , 'index'])->name('admin.index');

        Route::post('/update/{id}' , [AdminController::class , 'edit'])->name('admin.edit');
        Route::get('/deleteinvestor/{id}' , [AdminController::class , 'deleteinvestor'])->name('admin.delete.investor');
        Route::get('/deleteparticipant/{id}' , [AdminController::class , 'deleteparticipant'])->name('admin.delete.participant');
        Route::get('/deletepersone/{id}' , [AdminController::class , 'deletepersone'])->name('admin.delete.persone');






        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    });
