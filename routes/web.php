<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Item\RawMaterialCategoryController;
use App\Http\Controllers\System\Accessories\CurrencyController;
use App\Http\Controllers\System\Accessories\UnitController;
use App\Http\Controllers\System\OthersController;
use App\Http\Controllers\System\RolesPermissionsController;
use App\Http\Controllers\System\SettingController;
use App\Http\Controllers\System\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
})->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'permission'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::resource('raw-material-categories', RawMaterialCategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles-permissions', RolesPermissionsController::class);
    Route::resource('units', UnitController::class);
    Route::resource('currencies', CurrencyController::class);
    Route::resource('settings', SettingController::class)->only('index', 'update');
});

Route::controller(OthersController::class)->group(function () {
    Route::post('/test-mail', 'testMail')->name('test.mail');
    Route::get('/migrate', 'migrate')->name('migration');
    Route::get('/clear', 'clear')->name('clear');
    Route::get('/composer', 'composer')->name('composer');
    Route::get('/iseed', 'iseed')->name('iseed');
});
