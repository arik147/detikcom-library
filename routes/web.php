<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibliografiController;
use App\Http\Controllers\KategoriController;

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
    return view('welcome');
}); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
	
    // Route CRUD kategori dan bibliografi
    Route::resource('kategoris', KategoriController::class);

    Route::get('/bibliografis', [BibliografiController::class,'index'])
		->name('bibliografis.index');

	Route::get('/bibliografis/create', [BibliografiController::class,'create'])
		->name('bibliografis.create');
	
	Route::post('/bibliografis/create', [BibliografiController::class,'store'])
		->name('bibliografis.store');

	Route::get('/bibliografis/{bibliografi}', [BibliografiController::class,'show'])
		->name('bibliografis.show');

	Route::get('/bibliografis/{bibliografi}/edit', [BibliografiController::class,'edit'])
		->name('bibliografis.edit');

	Route::put('/bibliografis/{bibliografi}', [BibliografiController::class,'update'])
		->name('bibliografis.update');

	Route::delete('/bibliografis/{bibliografi}', [BibliografiController::class,'destroy'])
		->name('bibliografis.destroy');
		
	Route::post('/bibliografis', [BibliografiController::class, 'filter'])
		->name('bibliografis.filter');

	Route::get('/exportPDF', [BibliografiController::class, 'exportPDF'])
		->name('exportPDF');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

