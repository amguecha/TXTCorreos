<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers;

Route::get('/', [ExcelController::class, 'main'])->name('main');
Route::get('/upload', [ExcelController::class, 'uploadform'])->name('upload');
Route::post('/upload', [ExcelController::class, 'upload'])->name('upload.file');
Route::get('/table', [ExcelController::class, 'showTable'])->name('show.table');
Route::post('/generate-txt', [ExcelController::class, 'generateTxt'])->name('generate.txt');
Route::get('/generate-txt', function () { return Redirect::to('/'); });
Route::post('/user/settings', [UserSettingController::class, 'store'])->name('user.settings.store');
Route::get('/open-explorer', [ExcelController::class, 'openStorage'])->name('open.explorer');
Route::get('/copy-template', [ExcelController::class, 'copyTemplate'])->name('copy.template');
Route::get('/copy-documentation', [ExcelController::class, 'copyDocumentation'])->name('copy.documentation');
Route::get('/error', function () { return view('error'); });
Route::any('/{any}', function () { return view('error'); })->where('any', '.*');
