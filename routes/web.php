<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\SlideController;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\backend\EquipeController;
use App\Http\Controllers\backend\ModuleController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ParametreController;
use App\Http\Controllers\backend\ProgrammeController;
use App\Http\Controllers\backend\ReferenceController;
use App\Http\Controllers\backend\BiographieController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\MotDirecteurController;



Route::fallback(function () {
    return view('backend.utility.auth-404-basic');
});


// Route Admin
Route::middleware(['admin'])->prefix('admin')->group(function () {

    // login and logout
    Route::controller(AdminController::class)->group(function () {
        route::get('/login', 'login')->name('admin.login')->withoutMiddleware('admin'); // page formulaire de connexion
        route::post('/login', 'login')->name('admin.login')->withoutMiddleware('admin'); // envoi du formulaire
        route::post('/logout', 'logout')->name('admin.logout');
    });



    // dashboard admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // parametre application
    Route::prefix('parametre')->controller(ParametreController::class)->group(function () {
        route::get('', 'index')->name('parametre.index');
        route::post('store', 'store')->name('parametre.store');
        route::get('maintenance-up', 'maintenanceUp')->name('parametre.maintenance-up');
        route::get('maintenance-down', 'maintenanceDown')->name('parametre.maintenance-down');
        route::get('optimize-clear', 'optimizeClear')->name('parametre.optimize-clear');
        Route::get('download-backup/{file}', 'downloadBackup')->name('setting.download-backup');  // download backup db
    });


    //register admin
    Route::prefix('register')->controller(AdminController::class)->group(function () {
        route::get('', 'index')->name('admin-register.index');
        route::post('store', 'store')->name('admin-register.store');
        route::post('update/{id}', 'update')->name('admin-register.update');
        route::get('delete/{id}', 'delete')->name('admin-register.delete');
        route::get('profil/{id}', 'profil')->name('admin-register.profil');
        route::post('change-password', 'changePassword')->name('admin-register.new-password');
    });

    //role
    Route::prefix('role')->controller(RoleController::class)->group(function () {
        route::get('', 'index')->name('role.index');
        route::post('store', 'store')->name('role.store');
        route::post('update/{id}', 'update')->name('role.update');
        route::get('delete/{id}', 'delete')->name('role.delete');
    });

    //permission
    Route::prefix('permission')->controller(PermissionController::class)->group(function () {
        route::get('', 'index')->name('permission.index');
        route::get('create', 'create')->name('permission.create');
        route::post('store', 'store')->name('permission.store');
        route::get('edit{id}', 'edit')->name('permission.edit');
        route::put('update/{id}', 'update')->name('permission.update');
        route::get('delete/{id}', 'delete')->name('permission.delete');
    });

    //module
    Route::prefix('module')->controller(ModuleController::class)->group(function () {
        route::get('', 'index')->name('module.index');
        route::post('store', 'store')->name('module.store');
        route::post('update/{id}', 'update')->name('module.update');
        route::get('delete/{id}', 'delete')->name('module.delete');
    });

    // slide
    Route::prefix('slide')->controller(SlideController::class)->group(function () {
        route::get('', 'index')->name('slide.index');
        route::post('store', 'store')->name('slide.store');
        route::post('update/{id}', 'update')->name('slide.update');
        route::get('delete/{id}', 'delete')->name('slide.delete');
    });


    // biographie
    Route::prefix('biographie')->controller(BiographieController::class)->group(function () {
        route::get('', 'index')->name('biographie.index');
        route::get('create', 'create')->name('biographie.create');
        route::post('store', 'store')->name('biographie.store');
        route::post('upload-tinymce', 'uploadFromTinyMCE')->name('biographie.upload-tinymce'); // upload image tinymce
        route::get('edit{id}', 'edit')->name('biographie.edit');
        route::post('update/{id}', 'update')->name('biographie.update');
        route::get('delete/{id}', 'delete')->name('biographie.delete');
    });


    // programme
    Route::prefix('programme')->controller(ProgrammeController::class)->group(function () {
        route::get('', 'index')->name('programme.index');
        route::get('create', 'create')->name('programme.create');
        route::post('store', 'store')->name('programme.store');
        route::post('upload-tinymce', 'uploadFromTinyMCE')->name('programme.upload-tinymce'); // upload image tinymce
        route::get('edit{id}', 'edit')->name('programme.edit');
        route::post('update/{id}', 'update')->name('programme.update');
        route::get('delete/{id}', 'delete')->name('programme.delete');
    });


    // mot directeur
    Route::prefix('mot-directeur')->controller(MotDirecteurController::class)->group(function () {
        route::get('', 'index')->name('mot-directeur.index');
        route::get('create', 'create')->name('mot-directeur.create');
        route::post('store', 'store')->name('mot-directeur.store');
        route::get('edit{id}', 'edit')->name('mot-directeur.edit');
        route::post('update/{id}', 'update')->name('mot-directeur.update');
        route::get('delete/{id}', 'delete')->name('mot-directeur.delete');
    });


    // service
    Route::prefix('service')->controller(ServiceController::class)->group(function () {
        route::get('', 'index')->name('service.index');
        route::get('create', 'create')->name('service.create');
        route::post('store', 'store')->name('service.store');
        route::get('edit{id}', 'edit')->name('service.edit');
        route::post('update/{id}', 'update')->name('service.update');
        route::get('delete/{id}', 'delete')->name('service.delete');
    });



    // reference
    Route::prefix('reference')->controller(ReferenceController::class)->group(function () {
        route::get('', 'index')->name('reference.index');
        route::get('create', 'create')->name('reference.create');
        route::post('store', 'store')->name('reference.store');
        route::get('edit{id}', 'edit')->name('reference.edit');
        route::post('update/{id}', 'update')->name('reference.update');
        route::get('delete/{id}', 'delete')->name('reference.delete');
    });


    // equipe
    Route::prefix('equipe')->controller(EquipeController::class)->group(function () {
        route::get('', 'index')->name('equipe.index');
        // route::get('create', 'create')->name('equipe.create');
        route::post('store', 'store')->name('equipe.store');
        route::get('edit{id}', 'edit')->name('equipe.edit');
        route::post('update/{id}', 'update')->name('equipe.update');
        route::get('delete/{id}', 'delete')->name('equipe.delete');
    });
});


//Route frontend
Route::get('/', [SiteController::class, 'index'])->name('site.index'); // route sur le landing page

Route::get('/service-detail', [SiteController::class, 'serviceDetail'])->name('service-detail'); // 
Route::get('/contact', [SiteController::class, 'contact'])->name('contact'); // 
