<?php

use App\Models\Adhesion;
use App\Models\FlashInfo;
use App\Models\Parrainage;
use App\Models\Temoignage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\SlideController;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\backend\AgendaController;
use App\Http\Controllers\backend\EquipeController;
use App\Http\Controllers\backend\ModuleController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\AdhesionController;
use App\Http\Controllers\backend\ChantierController;
use App\Http\Controllers\backend\ActualiteController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\FlashInfoController;
use App\Http\Controllers\backend\ParametreController;
use App\Http\Controllers\backend\ProgrammeController;
use App\Http\Controllers\backend\ReferenceController;
use App\Http\Controllers\backend\BiographieController;
use App\Http\Controllers\backend\ParrainageController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\TemoignageController;
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
        route::get('edit/{id}', 'edit')->name('permission.edit');
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
        route::get('edit/{id}', 'edit')->name('biographie.edit');
        route::post('update/{id}', 'update')->name('biographie.update');
        route::get('delete/{id}', 'delete')->name('biographie.delete');
    });


    // programme
    Route::prefix('programme')->controller(ProgrammeController::class)->group(function () {
        route::get('', 'index')->name('programme.index');
        route::get('create', 'create')->name('programme.create');
        route::post('store', 'store')->name('programme.store');
        route::post('upload-tinymce', 'uploadFromTinyMCE')->name('programme.upload-tinymce'); // upload image tinymce
        route::get('edit/{id}', 'edit')->name('programme.edit');
        route::post('update/{id}', 'update')->name('programme.update');
        route::get('delete/{id}', 'delete')->name('programme.delete');
    });




    // chantier
    Route::prefix('chantier')->controller(ChantierController::class)->group(function () {
        route::get('', 'index')->name('chantier.index');
        route::get('create', 'create')->name('chantier.create');
        route::post('upload-tinymce', 'uploadFromTinyMCE')->name('chantier.upload-tinymce'); // upload image tinymce
        route::post('store', 'store')->name('chantier.store');
        route::get('edit/{id}', 'edit')->name('chantier.edit');
        route::post('update/{id}', 'update')->name('chantier.update');
        route::get('delete/{id}', 'delete')->name('chantier.delete');
    });



    // actualite
    Route::prefix('actualite')->controller(ActualiteController::class)->group(function () {
        route::get('', 'index')->name('actualite.index');
        route::get('create', 'create')->name('actualite.create');
        route::post('upload-tinymce', 'uploadFromTinyMCE')->name('actualite.upload-tinymce'); // upload image tinymce
        route::post('store', 'store')->name('actualite.store');
        route::get('edit/{id}', 'edit')->name('actualite.edit');
        route::post('update/{id}', 'update')->name('actualite.update');
        route::get('delete/{id}', 'delete')->name('actualite.delete');
    });




    // agenda
    Route::prefix('agenda')->controller(AgendaController::class)->group(function () {
        route::get('', 'index')->name('agenda.index');
        route::get('create', 'create')->name('agenda.create');
        route::post('upload-tinymce', 'uploadFromTinyMCE')->name('agenda.upload-tinymce'); // upload image tinymce
        route::post('store', 'store')->name('agenda.store');
        route::get('edit/{id}', 'edit')->name('agenda.edit');
        route::post('update/{id}', 'update')->name('agenda.update');
        route::get('delete/{id}', 'delete')->name('agenda.delete');
    });



    // flash infos
    Route::prefix('flash-infos')->controller(FlashInfoController::class)->group(function () {
        route::get('', 'index')->name('flash-infos.index');
        route::get('create', 'create')->name('flash-infos.create');
        route::post('upload-tinymce', 'uploadFromTinyMCE')->name('flash-infos.upload-tinymce'); // upload image tinymce
        route::post('store', 'store')->name('flash-infos.store');
        route::get('edit/{id}', 'edit')->name('flash-infos.edit');
        route::post('update/{id}', 'update')->name('flash-infos.update');
        route::get('delete/{id}', 'delete')->name('flash-infos.delete');
    });



    // equipe
    Route::prefix('equipe')->controller(EquipeController::class)->group(function () {
        route::get('', 'index')->name('equipe.index');
        // route::get('create', 'create')->name('equipe.create');
        route::post('store', 'store')->name('equipe.store');
        route::get('edit/{id}', 'edit')->name('equipe.edit');
        route::post('update/{id}', 'update')->name('equipe.update');
        route::get('delete/{id}', 'delete')->name('equipe.delete');
    });


    // temoignages
    Route::prefix('temoignange')->controller(TemoignageController::class)->group(function () {
        route::get('', 'index')->name('temoignage.index');
        route::get('create', 'create')->name('temoignage.create');
        route::post('store', 'store')->name('temoignage.store');
        route::get('edit/{id}', 'edit')->name('temoignage.edit');
        route::post('update/{id}', 'update')->name('temoignage.update');
        route::get('delete/{id}', 'delete')->name('temoignage.delete');
    });

    // parrainage
    Route::prefix('parrainage')->controller(ParrainageController::class)->group(function () {
        route::get('', 'index')->name('parrainage.index');
        route::get('create', 'create')->name('parrainage.create');
        route::post('store', 'store')->name('parrainage.store');
        route::get('edit/{id}', 'edit')->name('parrainage.edit');
        route::post('update/{id}', 'update')->name('parrainage.update');
        route::get('delete/{id}', 'delete')->name('parrainage.delete');
    });

    // adhesion membre
    Route::prefix('adhesion')->controller(AdhesionController::class)->group(function () {
        route::get('', 'index')->name('adhesion.index');
        route::get('create', 'create')->name('adhesion.create');
        route::post('store', 'store')->name('adhesion.store');
        route::get('edit/{id}', 'edit')->name('adhesion.edit');
        route::post('update/{id}', 'update')->name('adhesion.update');
        route::get('delete/{id}', 'delete')->name('adhesion.delete');
        route::get('insertDataFromCsv', 'insertDataFromCsv')->name('adhesion.insertDataFromCsv'); // export adhésion
    });
});






//############################################ Routes Frontend ##########################################################
route::middleware(['compteur.visites'])->group(function () {
    Route::get('/', [SiteController::class, 'accueil'])->name('site.accueil'); // page d'accueil


    /**ROUTE DES FORMULAIRES */
    // parrainage
    Route::get('/parrainage', [SiteController::class, 'parrainage'])->name('site.parrainage'); // page formulaire parrainage
    Route::post('/parrainage', [SiteController::class, 'parrainage'])->name('site.parrainage.store'); // traitement du formulaire de parrainage


    //adhesion
    Route::get('/adhesion', [SiteController::class, 'adhesion'])->name('site.adhesion'); // page formulaire adhesion
    Route::post('/adhesion', [SiteController::class, 'adhesion'])->name('site.adhesion.store'); // traitement du formulaire d'adhesion


    /** ROUTES DES PAGES ET DETAILS */

    // biographie du candidat
    Route::get('/biographie', [SiteController::class, 'biographie'])->name('site.biographie'); // page biographie du candidat


    // programme du candidat
    Route::get('/programme', [SiteController::class, 'programme'])->name('site.programme'); // page programme du candidat

    // chantiers du candidat
    Route::get('/chantier/{slug}', [SiteController::class, 'chantier'])->name('site.chantier'); // page chantiers du candidat

    // actualites du candidat
    Route::get('/actualite', [SiteController::class, 'actualite'])->name('site.actualite'); // page actualites du candidat
    // actualites du candidat
    Route::get('/actualite/{slug}', [SiteController::class, 'actualite_details'])->name('site.actualite_details'); // page actualites du candidat', [SiteController::class, 'actualite'])->name('site.actualite'); // page actualites du candidat

    // agenda du candidat
    Route::get('/agenda', [SiteController::class, 'agenda'])->name('site.agenda'); // page agenda du candidat
    Route::get('/agenda/{slug}', [SiteController::class, 'agenda_details'])->name('site.agenda_details'); // page actualites du candidat', [SiteController::class, 'actualite'])->name('site.actualite'); // page actualites du candidat

    // temoignages
    Route::get('/temoignages', [SiteController::class, 'temoignages'])->name('site.temoignages'); // page temoignages du candidat
    // contact
    Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact'); // page contact
    // traitement du formulaire de contact
    Route::post('/contact', [SiteController::class, 'contact'])->name('site.contact.store'); // traitement du formulaire de contact
});
