<?php

use App\Http\Controllers\Item\CategoryController;
use App\Http\Controllers\Item\NonInventoryItemController;
use App\Http\Controllers\Item\RawMaterialCategoryController;
use App\Http\Controllers\Item\RawMaterialController;
use App\Http\Controllers\System\Accessories\BrandController;
use App\Http\Controllers\System\Accessories\CurrencyController;
use App\Http\Controllers\System\Accessories\ProductionStageController;
use App\Http\Controllers\System\Accessories\TaxController;
use App\Http\Controllers\System\Accessories\UnitController;
use App\Http\Controllers\System\Administrator\ActivityLogController;
use App\Http\Controllers\System\RolesPermissionsController;
use App\Http\Controllers\System\SettingController;
use App\Http\Controllers\System\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'permission:head_office'])->group(function () {
    Route::resource('raw-material-categories', RawMaterialCategoryController::class);
    Route::resource('raw-materials', RawMaterialController::class);
    Route::resource('non-inventory-items', NonInventoryItemController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles-permissions', RolesPermissionsController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('units', UnitController::class);
    Route::resource('currencies', CurrencyController::class);
    Route::resource('taxes', TaxController::class);
    Route::resource('production-stages', ProductionStageController::class);
    Route::resource('activity-logs', ActivityLogController::class)->only('index', 'show');
    Route::resource('settings', SettingController::class)->only('index', 'update');
});
