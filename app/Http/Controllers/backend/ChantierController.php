<?php

namespace App\Http\Controllers\backend;

use App\Models\chantier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ChantierController extends Controller
{

    public function index()
    {
        try {
            $data_chantier = chantier::with('media')->get();

            return view('backend.pages.chantier.index', compact('data_chantier'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function create(Request $request)
    {
        return view('backend.pages.chantier.create');
    }


    /**
     * Enregistre une image pour TinyMCE via une requête Ajax.
     * Le champ 'draft_token' est utilisé pour lier l'image à un enregistrement "draft" de programme enregistré en base.
     * La méthode renvoie une réponse JSON avec l'URL de l'image enregistrée.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadFromTinyMCE(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:1024',
            'draft_token' => 'required|string',
        ]);

        $fakeprogramme = new Chantier();
        $fakeprogramme->id = 0; // modèle fictif
        $fakeprogramme->exists = true;

        $media = $fakeprogramme->addMediaFromRequest('file')
            ->usingFileName(time() . '_' . $request->file('file')->getClientOriginalName())
            ->withCustomProperties(['draft_token' => $request->draft_token])
            ->toMediaCollection('tiny-images');

        return response()->json([
            'location' => $media->getUrl(),
        ]);
    }


    public function store(Request $request)
    {
        try {
            //request validation .....

            $request->validate([
                'status' => 'required|string',
                'titre' => 'required|string',
                'description' => 'required|string',
                'draft_token' => 'required|string',
                'image' => 'nullable|image|max:1024',
            ]);
            // verifier si le chantier existe en base de données
            $condition = chantier::where('titre', $request['titre'])->exists();


            if ($condition) {
                return back()->with('error', 'Le chantier existe deja');
            }

            $chantier = chantier::firstOrCreate([
                'titre' => $request['titre'],
                'status' => $request['status'],
                'description' => $request['description'],
            ]);

            if (request()->hasFile('image')) {
                $chantier->addMediaFromRequest('image')->toMediaCollection('image');
            }

            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Chantier::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($chantier) {
                    $media->model_id = $chantier->id;
                    $media->save();
                });


            Alert::Success('Opération', 'SuccessMessage');
            return back();
        } catch (\Throwable $th) {

            return back()->with('error' , $th->getMessage()) ;
        }
    }


    public function edit($id)
    {
        try {
            $data_chantier = chantier::find($id);

            return view('backend.pages.chantier.edit', compact('data_chantier'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function update(Request $request, $id)
    {

       try{
         //request validation ......

        $chantier = tap(chantier::find($id))->update([
            'titre' => $request['titre'],
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            $chantier->clearMediaCollection('image');
            $chantier->addMediaFromRequest('image')->toMediaCollection('image');
        }


        // Associer les images TinyMCE au modèle enregistré
        Media::where('custom_properties->draft_token', $request->draft_token)
            ->where('model_type', Chantier::class)
            ->where('model_id', 0)
            ->get()
            ->each(function ($media) use ($chantier) {
                $media->model_id = $chantier->id;
                $media->save();
            });

        Alert::success('Opération réussi', 'Success Message');
        return back();
       }catch(\Throwable $th ){
            return $th->getMessage();
       }
    }


    public function delete($id)
    {
        chantier::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
