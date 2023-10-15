<?php

use App\Http\Controllers\Backend\VariationTemplateController;
use Illuminate\Support\Facades\Route;

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

Route::get('variation-template',[VariationTemplateController::class, 'index']);
Route::post('variation-template/store',[VariationTemplateController::class, 'store'])->name('store.variationTemplate');
Route::get('variation-template/edit/{id}',[VariationTemplateController::class, 'edit'])->name('edit.variationTemplate');
Route::post('variation-template/update/{id}',[VariationTemplateController::class, 'update'])->name('update.variationTemplate');
