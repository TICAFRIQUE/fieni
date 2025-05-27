<?php

namespace App\Http\Controllers\frontend;

use App\Models\Slide;
use App\Models\Equipe;
use App\Models\Service;
use App\Models\Adhesion;
use App\Models\Chantier;
use App\Models\Actualite;
use App\Models\FlashInfo;
use App\Models\Reference;
use App\Models\Biographie;
use App\Models\MotDirecteur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Parrainage;

class SiteController extends Controller
{
    /**
     * PAGE D'ACCUEIL.
     */
    public function accueil(Request $request)
    {
        try {
            //1- recuperer les sliders 
            $data_slide = Slide::active()->get();

            // recuperer la biographie du candidat
            $data_biographie = Biographie::active()->first();

            // programme du candidat
            $data_chantier = Chantier::active()->get();

            // les actualites
            $data_actualite = Actualite::active()
                ->orderBy('date_publication', 'desc')
                ->limit(3)
                ->get();

            //5-Recuperer les membres equipe actives
            $data_equipe = Equipe::active()->get();

            //Flash infos
            $data_flash_info = FlashInfo::active()->get();


            return view('frontend.index', compact(
                'data_slide',
                'data_biographie',
                'data_chantier',
                'data_actualite',
                'data_flash_info',
            ));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    /**FORMULAIRE DE PARRAINAGE, FORMULAIRE D'ADHESION , CONTACT */

    public function parrainage(Request $request)
    {
        try {
            //page du formulaire de parrainage
            if ($request->isMethod('GET')) {
                return view('frontend.pages.parrainage');
            }



            //traitement du formulaire de parrainage
            if ($request->isMethod('POST')) {
                $data = $request->validate([
                    'carte_electeur' => 'nullable',
                    'numero_cni' => 'nullable|string|max:20',
                    'lieu_enrolement' => 'required|string|max:255',
                    'nom' => 'required|string|max:100',
                    'prenoms' => 'required|string|max:100',
                    'nom_epouse' => 'nullable|string|max:100',
                    'date_naissance' => 'required|date',
                    'lieu_naissance' => 'required|string|max:255',
                    'contact' => 'required|string|max:15',
                ]);

                //le membre ne doit pas deja exister
                $existingParrainage = Parrainage::where('nom', $data['nom'])
                    ->where('prenoms', $data['prenoms'])
                    ->orWhere('contact', $data['contact'])
                    ->first();
                if ($existingParrainage) {
                    return back()->with('error', 'Vous avez déjà soumis une demande de parrainage avec cet nom , prenoms ou ce contact.');
                } else {
                    $parrainage = Parrainage::create($data);
                }

                return back()->with('success', 'Formulaire soumis avec succès.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la soumission du formulaire. Veuillez réessayer plus tard. ' . $th->getMessage());
        }
    }


    public function adhesion(Request $request)
    {
        try {
            //page du formulaire de parrainage
            if ($request->isMethod('GET')) {
                return view('frontend.pages.adhesion');
            }



            //traitement du formulaire de parrainage
            if ($request->isMethod('POST')) {
                $data = $request->validate([
                    'nom' => 'required|string|max:100',
                    'prenoms' => 'required|string|max:100',
                    'genre' => 'required|in:monsieur,madame,mademoiselle',
                    'email' => 'nullable|email|max:255',
                    'pays' => 'required|string|max:100',
                    'commune' => 'required|string|max:100',
                    'contact' => 'required|string|max:15',
                ]);

                //le membre ne doit pas deja exister
                $existingAdhesion = Adhesion::where('nom', $data['nom'])
                    ->where('prenoms', $data['prenoms'])
                    ->orWhere('contact', $data['contact'])
                    ->first();
                if ($existingAdhesion) {
                    return back()->with('error', 'Vous avez déjà soumis une demande d\'adhésion avec cet nom , prenoms ou ce contact.');
                } else {
                    $adhesion = Adhesion::create($data);
                }

                return back()->with('success', 'Formulaire soumis avec succès.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la soumission du formulaire. Veuillez réessayer plus tard. ' . $th->getMessage());
        }
    }



    /**PAGES ET DETAILS DES PAGES */

    //biographie du candidat
    /**
     * Affiche la biographie du candidat.
     *
     * @return \Illuminate\View\View
     */
    public function biographie()
    {
        try {
            $biographie = Biographie::active()->first();
            return view('frontend.pages.biographie', compact('biographie'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération des services : ' . $th->getMessage());
        }
    }
}
