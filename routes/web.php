<?php

use App\Http\Controllers\Admin\AssessmentSchemaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profil', [UserController::class, 'index'])->name('user.index');
    Route::post('/profil/ubah-password/', [UserController::class, 'password'])->name('user.password');
    Route::post('/profil/ubah-data/', [UserController::class, 'update'])->name('user.update');

    Route::prefix('admin/assessment-schema')->name('admin.assessment-schema.')->group(function () {
        Route::get('/', [AssessmentSchemaController::class, 'index'])->name('index');
        Route::post('/organizations', [AssessmentSchemaController::class, 'storeOrganization'])->name('organizations.store');
        Route::delete('/organizations/{organization}', [AssessmentSchemaController::class, 'destroyOrganization'])->name('organizations.destroy');
        Route::post('/frameworks', [AssessmentSchemaController::class, 'storeFramework'])->name('frameworks.store');
        Route::delete('/frameworks/{framework}', [AssessmentSchemaController::class, 'destroyFramework'])->name('frameworks.destroy');
        Route::post('/constructs', [AssessmentSchemaController::class, 'storeConstruct'])->name('constructs.store');
        Route::delete('/constructs/{construct}', [AssessmentSchemaController::class, 'destroyConstruct'])->name('constructs.destroy');
        Route::post('/instruments', [AssessmentSchemaController::class, 'storeInstrument'])->name('instruments.store');
        Route::delete('/instruments/{instrument}', [AssessmentSchemaController::class, 'destroyInstrument'])->name('instruments.destroy');
        Route::post('/blueprints', [AssessmentSchemaController::class, 'storeBlueprint'])->name('blueprints.store');
        Route::delete('/blueprints/{blueprint}', [AssessmentSchemaController::class, 'destroyBlueprint'])->name('blueprints.destroy');
        Route::post('/blueprint-cells', [AssessmentSchemaController::class, 'storeBlueprintCell'])->name('blueprint-cells.store');
        Route::delete('/blueprint-cells/{blueprintCell}', [AssessmentSchemaController::class, 'destroyBlueprintCell'])->name('blueprint-cells.destroy');
        Route::post('/forms', [AssessmentSchemaController::class, 'storeForm'])->name('forms.store');
        Route::delete('/forms/{form}', [AssessmentSchemaController::class, 'destroyForm'])->name('forms.destroy');
    });
});
