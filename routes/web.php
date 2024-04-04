<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenutypeController;
use App\Http\Controllers\MenulistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Displays the menutypes table
Route::get('/menutypes', [MenutypeController::class, 'index'])
    ->name('menutypes.index');

// Displays the menutype create form
Route::get('/menutypes/create', [MenutypeController::class, 'create'])
    ->name('menutypes.create');

// Endpoint for submitting a menutype create form
Route::post('/menutypes/create', [MenutypeController::class, 'store'])
    ->name('menutypes.create');

// Displays the menutype edit form with wildcard {menutype}
Route::get('/menutypes/edit/{menutype}', [MenutypeController::class, 'edit'])
    ->name('menutypes.edit');

// Endpoint for submitting a menutype edit form
Route::post('/menutypes/edit/{menutype}', [MenutypeController::class, 'update'])
    ->name('menutypes.edit');

// Endpoint for submitting a menutype delete form
Route::post('/menutypes/delete/{menutype}', [MenutypeController::class, 'destroy'])
    ->name('menutypes.delete');



// Displays the products table
Route::get('/menulists', [MenulistController::class, 'index'])
    ->name('menulists.index');

// Displays the product create form
Route::get('/menulists/create', [MenulistController::class, 'create'])
    ->name('menulists.create');

// Endpoint for submitting a product create form
Route::post('/menulists/create', [MenulistController::class, 'store'])
    ->name('menulists.create');

// Displays the product edit form
Route::get('/menulists/edit/{menulist}', [MenulistController::class, 'edit'])
    ->name('menulists.edit');

// Endpoint for submitting a product edit form
Route::post('/menulists/edit/{menulist}', [MenulistController::class, 'update'])
    ->name('menulists.edit');

// Endpoint for submitting a product delete form
Route::post('/menulists/delete/{menulist}', [MenulistController::class, 'destroy'])
    ->name('menulists.delete');
