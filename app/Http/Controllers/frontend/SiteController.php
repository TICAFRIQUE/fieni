<?php

namespace App\Http\Controllers\frontend;

use App\Models\Slide;
use App\Models\Equipe;
use App\Models\Service;
use App\Models\Reference;
use App\Models\MotDirecteur;
use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // public function index(Request $request)
    // {
    //     try {
    //         //1- recuperer les sliders 
    //         $data_slide = Slide::active()->get();

    //         //recuperer la presentation
    //         $data_presentation = Presentation::active()->first();

    //         //2-recuperer le mot directeur active
    //         $data_mot_directeur = MotDirecteur::active()->first();

    //         //3- recuperer les services active
    //         $data_service = Service::active()->get();

    //         //4-Recuperer les references actives
    //         $data_reference = Reference::active()->get();

    //         //5-Recuperer les membres equipe actives
    //         $data_equipe = Equipe::active()->get();

    //         return view('frontend.index', compact(
    //             'data_slide',
    //             'data_presentation',
    //             'data_mot_directeur',
    //             'data_service',
    //             'data_reference',
    //             'data_equipe'

    //         ));
    //     } catch (\Throwable $th) {
    //         return $th->getMessage();
    //     }
    // }



    public function index(){
        return view('frontend.index');
    }



    // public function index()
    // {
    //     return view('index');
    // }  


    public function serviceDetail()
    {
        try {
            $data_service = Service::active()->get();

            return view('frontend.pages.service_detail', compact('data_service'));
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }



    public function Contact()
    {
        try {
            $data_service = Service::active()->get();

            return view('frontend.pages.contact' , compact('data_service'));
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
}
