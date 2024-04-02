<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'home']);
Route::prefix('crud')->group(function () {
	Route::get('/lists', [CrudController::class, 'index'])->name('lists.index');
	Route::get('/lists/{id}', [CrudController::class, 'show'])->name('lists.show');
	Route::get('/lists/create', [CrudController::class, 'create'])->name('lists.create');
	Route::post('/lists/store', [CrudController::class, 'store'])->name('lists.store');
	Route::get('/lists/{id}/edit', [CrudController::class, 'edit'])->name('lists.edit');
	Route::put('/lists/{id}', [CrudController::class, 'update'])->name('lists.update');
	Route::delete('/lists/{id}', [CrudController::class, 'destroy'])->name('lists.destroy');
});