<?php

use App\Http\Controllers\api\academic\AcademicClassSubjectController;
use App\Http\Controllers\api\academic\AcademicClassController;
use App\Http\Controllers\api\blog\BlogCategoryController;
use App\Http\Controllers\api\blog\BlogController;
use App\Http\Controllers\api\blog\TagController;
use App\Http\Controllers\api\digital_book\DigitalBookCategoryController;
use App\Http\Controllers\api\digital_book\DigitalBookController;
use App\Http\Controllers\api\employee\EmployeeController;
use App\Http\Controllers\api\employee\EmployeeRoleController;
use App\Http\Controllers\api\gallery\GalleryPhotoCategoryController;
use App\Http\Controllers\api\gallery\GalleryPhotoController;
use App\Http\Controllers\api\gallery\GalleryVideoCategoryController;
use App\Http\Controllers\api\gallery\GalleryVideoController;
use App\Http\Controllers\api\navbar\NavbarMenuController;
use App\Http\Controllers\api\navbar\NavbarMenuItemController;
use App\Http\Controllers\api\news\NewsCategoryController;
use App\Http\Controllers\api\news\NewsController;
use App\Http\Controllers\api\settings\SettingsController;
use App\Http\Controllers\api\settings\SettingsTitleController;
use App\Http\Controllers\api\settings\SettingsTitleValueController;
use App\Http\Controllers\api\student\StudentDueController;
use App\Http\Controllers\api\student\StudentInformationController;
use App\Http\Controllers\api\student\StudentResultController;
use App\Http\Controllers\Auth\ApiLoginController;
use Database\Seeders\DigitalBookCategorySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('v1')
    ->middleware(['api:guest'])
    ->group(function () {

        Route::group(['prefix' => '/user', 'middleware' => ['guest:api']], function () {
            Route::post('/get-token', 'Auth\ApiLoginController@get_token');
            Route::post('/api-login', 'Auth\ApiLoginController@login');
            Route::post('/api-register', 'Auth\ApiLoginController@register');
            Route::get('/auth-check', 'Auth\ApiLoginController@auth_check');
            Route::post('/forget-mail', 'Auth\ApiLoginController@forget_mail');
            Route::post('/check-code', 'Auth\ApiLoginController@check_code');
            Route::post('/logout-from-all-devices', 'Auth\ApiLoginController@logout_from_all_devices');
        });
    });

Route::prefix('v1')->group(function () {
    Route::get('user', [ApiLoginController::class, 'check_auth'])
        ->middleware('check_token','api:auth');
});


Route::prefix('v1')
    // ->middleware(['api:auth'])
    ->group(function () {

        Route::controller(AcademicClassController::class)
            ->prefix('/academic-class')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(AcademicClassSubjectController::class)
            ->prefix('/academic-class-subjects')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });
        Route::controller(BlogCategoryController::class)
            ->prefix('/blog-category')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });
        Route::controller(BlogController::class)
            ->prefix('/blog')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });



        Route::controller(TagController::class)
            ->prefix('/blog-tag')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });



        Route::controller(DigitalBookCategoryController::class)
            ->prefix('/digital-book-category')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });


        Route::controller(DigitalBookController::class)
            ->prefix('/digital-book')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });


        Route::controller(EmployeeRoleController::class)
            ->prefix('/employee-role')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });


        Route::controller(EmployeeController::class)
            ->prefix('/employee')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });


        Route::controller(GalleryPhotoCategoryController::class)
            ->prefix('/gallery-photo-category')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });


        Route::controller(GalleryPhotoController::class)
            ->prefix('/gallery-photo')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });


        Route::controller(GalleryVideoCategoryController::class)
            ->prefix('/gallery-video-category')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(GalleryVideoController::class)
            ->prefix('/gallery-video')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(NavbarMenuController::class)
            ->prefix('/navbar-menu')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(NavbarMenuItemController::class)
            ->prefix('/navbar-menu-item')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(NewsCategoryController::class)
            ->prefix('/news-category')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(NewsController::class)
            ->prefix('/news')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(SettingsTitleController::class)
            ->prefix('/setting-title')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(SettingsTitleValueController::class)
            ->prefix('/setting-title-value')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(StudentInformationController::class)
            ->prefix('/student-information')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(StudentDueController::class)
            ->prefix('/student-due')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });

        Route::controller(StudentResultController::class)
            ->prefix('/student-result')
            ->group(function () {
                Route::get('/all', 'all');
                Route::get('/{id}', 'show');
                Route::post('/store', 'store');
                Route::post('/canvas-store', 'canvas_store');
                Route::post('/update', 'update');
                Route::post('/canvas-update', 'canvas_update');
                Route::post('/soft-delete', 'soft_delete');
                Route::post('/restore', 'restore');
                Route::post('/destroy', 'destroy');
                Route::post('/bulk-import', 'bulk_import');
            });
    });
