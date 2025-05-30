<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Slide;
use App\Models\Adhesion;
use App\Models\Compteur;
use App\Models\Actualite;
use App\Models\Parametre;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        Carbon::setLocale('fr');



        Schema::defaultStringLength(191);


        $this->app->booted(function () {
            try {
                if (Schema::hasTable('permissions') && Schema::hasTable('roles')) {
                    $permissions = Permission::pluck('id')->toArray();

                    $developpeurRole = Role::where('name', 'developpeur')->first();
                    $superadminRole = Role::where('name', 'superadmin')->first();

                    if ($developpeurRole) {
                        $developpeurRole->permissions()->sync($permissions);
                    }

                    if ($superadminRole) {
                        $superadminRole->permissions()->sync($permissions);
                    }
                }
            } catch (\Exception $e) {
                // Optionnel : log de l'erreur si besoin
                return back()->withErrors('Une erreur est survenue lors de la synchronisation des permissions.', 'Message d\'erreur:' . $e->getMessage());
            }
        });



        //recuperer les parametres
        if (Schema::hasTable('parametres')) {
            $data_parametre = Parametre::with('media')->first();
        }

        // recuperer les actualites recentes
        if (Schema::hasTable('slides')) {
            // les actualites
            $data_actualite = Actualite::active()
                ->orderBy('date_publication', 'desc')
                ->limit(3)
                ->get();
        }

        //recuperer le compteur de visites
        if (Schema::hasTable('compteurs')) {
            $compteur_visites = Compteur::first()->visites ?? 554267;
        }

        // nombre de membres
        if (Schema::hasTable('adhesions')) {
            $nombre_membres = Adhesion::count();
        } else {
            $nombre_membres = 0;
        }

        view()->share([
            'parametre' => $data_parametre ?? null,
            'data_actualite' => $data_actualite ?? null,
            'compteur_visites' => $compteur_visites ?? 554267,
            'compteur_membres' => $nombre_membres ?? 0,
        ]);
    }
}
