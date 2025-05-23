<?php

namespace App\Http\Controllers\frontend;

use App\Models\Slide;
use App\Models\Equipe;
use App\Models\Service;
use App\Models\Chantier;
use App\Models\Actualite;
use App\Models\Reference;
use App\Models\Biographie;
use App\Models\MotDirecteur;
use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * Handle the incoming request.
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

            return view('frontend.index', compact(
                'data_slide',
                'data_biographie',
                'data_chantier',
                'data_actualite',
            ));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }





    // public function index()
    // {
    //     return view('index');
    // }  







}
