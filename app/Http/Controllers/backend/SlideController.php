<?php

namespace App\Http\Controllers\backend;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $data_slide = Slide::with('media')->get();

            return view('backend.pages.slide.index', compact('data_slide'));
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }



    public function store(Request $request)
    {
        try {
            // dd($request->all());    

            // Validation des données
            $data = $request->validate([
                'titre' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required',
                'image_background' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024', // sécurise l'image
                'image_candidat' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024', // sécurise l'image

            ]);

            // Création du slide
            $slide = Slide::create([
                'titre' => $request['titre'],
                'description' => $request['description'],
                'status' => $request['status'],
            ]);

            // Gestion de l'image (s'il y en a une)
            if ($request->hasFile('image_background')) {
                $slide->addMediaFromRequest('image_background')->toMediaCollection('image_background');
            }
            if ($request->hasFile('image_candidat')) {
                $slide->addMediaFromRequest('image_candidat')->toMediaCollection('image_candidat');
            }
         

            // Message de succès
            Alert::success('Opération réussie', 'Le slide a bien été enregistré.');

            return back();
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    public function update(Request $request, $id)
    {

        try {
            //request validation .......
            $data = $request->validate([
                'titre' => '',
                'description' => '',
                'status' => 'required',
            ]);

            $data_Slide = tap(Slide::find($id))->update([
                'titre' => $request['titre'],
                'description' => $request['description'],
                'status' => $request['status'],
            ]);

            if (request()->hasFile('image_background')) {
                $data_Slide->clearMediaCollection('image_background');
                $data_Slide->addMediaFromRequest('image_background')->toMediaCollection('image_background');
            }
            if (request()->hasFile('image_candidat')) {
                $data_Slide->clearMediaCollection('image_candidat');
                $data_Slide->addMediaFromRequest('image_candidat')->toMediaCollection('image_candidat');
            }

            Alert::success('Opération réussi', 'Success Message');
            return back();
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    public function delete($id)
    {
        try {
            Slide::find($id)->delete();
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ]);
        }
    }
}
