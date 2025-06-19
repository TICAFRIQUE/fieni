<?php

namespace App\Http\Controllers\frontend;

use App\Models\Slide;
use App\Models\Video;
use App\Models\Agenda;
use App\Models\Equipe;
use App\Models\Visite;
use App\Models\Service;
use App\Models\Adhesion;
use App\Models\Chantier;
use App\Models\Compteur;
use App\Models\Actualite;
use App\Models\FlashInfo;
use App\Models\Programme;
use App\Models\Reference;
use App\Models\Biographie;
use App\Models\Parrainage;
use App\Models\Temoignage;
use App\Models\MotDirecteur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            $data_chantier = Chantier::active()->orderBy('created_at', 'asc')->get();

            // les actualites
            $data_actualite = Actualite::active()
                ->orderBy('date_publication', 'desc')
                ->limit(3)
                ->get();

            // events à venir
            $data_agenda = Agenda::public()
                ->where('date_debut', '>', now())
                ->orderBy('date_debut', 'asc')
                ->limit(5)
                ->get();

            // dd($data_agenda);

            //5-Recuperer les membres equipe actives
            $data_equipe = Equipe::active()->get();

            //Flash infos
            $data_flash_info = FlashInfo::active()->get();

            // temoignages
            $data_temoignage = Temoignage::active()->orderBy('created_at', 'asc')->get();



            return view('frontend.index', compact(
                'data_slide',
                'data_biographie',
                'data_chantier',
                'data_actualite',
                'data_flash_info',
                'data_agenda',
                'data_temoignage',

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


    public function contact()
    {
        try {
            //page du formulaire de contact
            return view('frontend.pages.contact');
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de l\'affichage du formulaire de contact : ' . $th->getMessage());
        }
    }
    // public function contact_store(Request $request)
    // {
    //     try {
    //         //traitement du formulaire de contact
    //         $data = $request->validate([
    //             'nom' => 'required|string|max:100',
    //             'email' => 'required|email|max:255',
    //             'sujet' => 'required|string|max:255',
    //             'message' => 'required|string|max:500',
    //         ]);

    //         // Enregistrer le message de contact
    //         Contact::create($data);

    //         return back()->with('success', 'Votre message a été envoyé avec succès.');
    //     } catch (\Throwable $th) {
    //         return back()->with('error', 'Une erreur est survenue lors de l\'envoi du message : ' . $th->getMessage());
    //     }
    // }



    /**PAGES ET DETAILS DES PAGES */

    //biographie du candidat

    public function biographie()
    {
        try {
            $biographie = Biographie::active()->first();
            return view('frontend.pages.biographie', compact('biographie'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération de la biographie : ' . $th->getMessage());
        }
    }


    //programme du candidat
    public function programme()
    {
        try {
            $programme = Programme::active()->first();
            $data_chantier = Chantier::active()->get();

            return view('frontend.pages.programme', compact('programme', 'data_chantier'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération des programmes : ' . $th->getMessage());
        }
    }

    // videotheque
    public function videotheque()
    {
        try {
            $data_video = Video::active()->get();
            return view('frontend.pages.video', compact('data_video'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération de la vidéothèque : ' . $th->getMessage());
        }
    }


    //Détails d'un programme -- chantier
    public function chantier($slug)
    {
        try {
            // recuperer le chantier active par son slug
            $chantier = Chantier::active()->whereSlug($slug)->first();
            if (!$chantier) {
                return back()->with('error', 'programme non trouvée ou inactive.');
            }
            $chantier = Chantier::active()->findOrFail($chantier->id);


            $data_chantier = Chantier::active()->get(); // recuperer la liste des chantiers

            return view('frontend.pages.chantier_detail', compact('chantier' , 'data_chantier'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération des détails du chantier : ' . $th->getMessage());
        }
    }


    //Actualités
    public function actualite()
    {
        try {
            $actualite = Actualite::active()->orderBy('date_publication', 'desc')->paginate(9);

            return view('frontend.pages.actualite', compact('actualite'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération des actualites : ' . $th->getMessage());
        }
    }


    //Détails d'une actualité
    public function actualite_details($slug)
    {
        try {
            // recuperer l'actualité active par son slug
            $actualite = Actualite::active()->whereSlug($slug)->first();
            if (!$actualite) {
                return back()->with('error', 'Actualité non trouvée ou inactive.');
            }
            $actualite = Actualite::active()->findOrFail($actualite->id);
            $actualite->load('media');

            // Récupérer les médias associés à l'actualité
            $galerie = $actualite->getMedia('galerie');


            return view('frontend.pages.actualite_detail', compact('actualite', 'galerie'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération des détails de l\'actualité : ' . $th->getMessage());
        }
    }


    public function agenda()
    {
        try {
            $agenda = Agenda::public()->orderBy('date_debut', 'asc')
                ->paginate(12);
            return view('frontend.pages.agenda', compact('agenda'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération des agendas : ' . $th->getMessage());
        }
    }

    public function agenda_details($slug)
    {
        try {
            // recuperer l'actualité active par son slug
            $agenda = Agenda::public()->whereSlug($slug)->first();
            if (!$agenda) {
                return back()->with('error', 'Agenda non trouvée ou inactive.');
            }
            $agenda = Agenda::public()->findOrFail($agenda->id);


            return view('frontend.pages.agenda_detail', compact('agenda'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération des détails de l\'agenda : ' . $th->getMessage());
        }
    }
}
