<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DarAlNashrController;
use App\Http\Controllers\Admin\EventBookController;
use App\Http\Controllers\Admin\InvestorController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ParticipantController  ;
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



        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'participant'],function(){
            Route::get('/' , [ParticipantController::class , 'index'])->name('admin.participant.index');
            Route::get('/deleteparticipant/{id}' , [ParticipantController::class , 'delete'])->name('admin.participant.delete');
        });


        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'investor'],function(){
            Route::get('/' , [InvestorController::class , 'index'])->name('admin.investor.index');
            Route::get('/deleteinvestor/{id}' , [InvestorController::class , 'delete'])->name('admin.investor.delete');
            Route::post('/update/{id}' , [InvestorController::class , 'edit'])->name('admin.investor.edit');
        });


        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'winner'],function(){
            Route::get('/' , [EventBookController::class , 'index'])->name('admin.winner.index');
            Route::get('/delete/{id}' , [EventBookController::class , 'delete'])->name('admin.winner.delete');

        });

        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'leads'],function(){
            Route::get('/' , [LeadController::class , 'index'])->name('admin.leads.index');
            Route::get('/delete/{id}' , [LeadController::class , 'delete'])->name('admin.leads.delete');

        });

        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'dar-al-nashr'],function(){
            Route::get('/' , [DarAlNashrController::class , 'index'])->name('admin.dar-al-nashr.index');
            Route::post('/store' , [DarAlNashrController::class , 'store'])->name('admin.dar-al-nashr.store');
            Route::get('/delete/{id}' , [DarAlNashrController::class , 'delete'])->name('admin.dar-al-nashr.delete');

        });




        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    });
