<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visite;
use App\Models\Compteur;

class CompteurVisitesMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $page = $request->route()->getName() ?? $request->path();
        $ip = $request->ip();

        // Vérifier si visite déjà enregistrée aujourd’hui pour cette IP + page
        $alreadyVisited = Visite::where('page', $page)
            ->where('ip', $ip)
            ->whereDate('created_at', today())
            ->exists();

        if (! $alreadyVisited) {
            Visite::create([
                'page' => $page,
                'ip' => $ip,
            ]);

            // Incrémenter compteur global
            $compteur = Compteur::first();
            if (! $compteur) {
                $compteur = Compteur::create(['visites' => 554267]);
            }
            $compteur->increment('visites');
        }

        return $next($request);
    }
}
