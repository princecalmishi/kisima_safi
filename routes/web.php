<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('/');


Route::get('/book', [App\Http\Controllers\HomeController::class, 'book'])->name('book');
Route::post('/bookform', [App\Http\Controllers\HomeController::class, 'bookform'])->name('bookform');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin routes
Route::group(['middleware' => ['Admin']], function(){

        Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
        Route::get('/pendingbooks', [App\Http\Controllers\HomeController::class, 'pendingbooks'])->name('pendingbooks');
        Route::get('/scheduledbooks', [App\Http\Controllers\HomeController::class, 'scheduledbooks'])->name('scheduledbooks');
        Route::get('/createservice', [App\Http\Controllers\HomeController::class, 'createservice'])->name('createservice');
        Route::get('/slides', [App\Http\Controllers\HomeController::class, 'slides'])->name('slides');
        Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
        Route::get('/schedulenow/{id}', [App\Http\Controllers\HomeController::class, 'schedulenow'])->name('schedulenow');
        Route::post('/schedulenowform', [App\Http\Controllers\HomeController::class, 'schedulenowform'])->name('schedulenowform');
        Route::get('/completenow/{id}', [App\Http\Controllers\HomeController::class, 'completenow'])->name('completenow');

        Route::post('/createserviceform', [App\Http\Controllers\HomeController::class, 'createserviceform'])->name('createserviceform');
       
        Route::get('/createuser', [App\Http\Controllers\HomeController::class, 'createuser'])->name('createuser');
        Route::post('/createuserform', [App\Http\Controllers\HomeController::class, 'createuserform'])->name('createuserform');

        Route::get('/removeuser/{id}', [App\Http\Controllers\HomeController::class, 'removeuser'])->name('removeuser');
        Route::get('/updateuser/{id}', [App\Http\Controllers\HomeController::class, 'updateuser'])->name('updateuser');
        Route::post('/updateuserform', [App\Http\Controllers\HomeController::class, 'updateuserform'])->name('updateuserform');

        Route::get('/listservices', [App\Http\Controllers\HomeController::class, 'listservices'])->name('listservices');
        Route::get('/images', [App\Http\Controllers\HomeController::class, 'images'])->name('images');

        Route::get('/removeservice/{id}', [App\Http\Controllers\HomeController::class, 'removeservice'])->name('removeservice');
        Route::get('/updateservicep/{id}', [App\Http\Controllers\HomeController::class, 'updateservicep'])->name('updateservicep');
        Route::post('/updateserviceform', [App\Http\Controllers\HomeController::class, 'updateserviceform'])->name('updateserviceform');
        Route::post('/uploadimage', [App\Http\Controllers\HomeController::class, 'uploadimage'])->name('uploadimage');
        Route::get('/deleteimage/{id}', [App\Http\Controllers\HomeController::class, 'deleteimage'])->name('deleteimage');


    });


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
