<?php

namespace App\Http\Controllers\backend;

use App\Models\Actualite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ActualiteController extends Controller
{

    public function index()
    {
        try {
            $data_actualite = Actualite::with('media')->get();

            return view('backend.pages.actualite.index', compact('data_actualite'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function create(Request $request)
    {
        return view('backend.pages.actualite.create');
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

        $fakeprogramme = new actualite();
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
            // dd($request->all());

            $request->validate([
                'status' => 'required|string',
                'titre' => 'required|string',
                'description' => '',
                'draft_token' => 'required|string',
                'image_une' => 'required|image|max:1024',

            ]);
            // verifier si le actualite existe en base de données
            // $condition = Actualite::where('titre', $request['titre'])->exists();


            // if ($condition) {
            //     return back()->with('error', 'Le actualite existe deja');
            // }

            $actualite = Actualite::firstOrCreate([
                'titre' => $request['titre'],
                'status' => $request['status'],
                'vedette' => $request['vedette'],
                'date_publication' => $request['date_publication'],
                'description' => $request['description'],
            ]);

            // image a la une
            if (request()->hasFile('image_une')) {
                $actualite->addMediaFromRequest('image_une')->toMediaCollection('image');
            }

            // gallery d'images 1 ou plusieurs
            if (request()->filled('galerie')) {

                foreach ($request->input('galerie') as $fileData) {
                    // Décoder l'image base64
                    $fileData = explode(',', $fileData);
                    $fileExtension = explode('/', explode(';', $fileData[0])[0])[1];
                    $decodedFile = base64_decode($fileData[1]);

                    // Créer un fichier temporaire
                    $tempFilePath = sys_get_temp_dir() . '/' . uniqid() . '.' . $fileExtension;
                    file_put_contents($tempFilePath, $decodedFile);

                    // Ajouter l'image à la collection de médias
                    $media = $actualite->addMedia($tempFilePath)->toMediaCollection('galerie');

                    // Optimiser l'image après l'ajout
                    \Spatie\ImageOptimizer\OptimizerChainFactory::create()->optimize($media->getPath());
                }
            }


            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Actualite::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($actualite) {
                    $media->model_id = $actualite->id;
                    $media->save();
                });


            // Réponse en cas de succès
            return response()->json([
                'success' => true,
                'message' => 'Actualité créé avec succès',
                'data' => $actualite->with('media')->first()
            ], 201);
        } catch (\Throwable $th) {
            // Réponse en cas d'erreur
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de l\'actualité : ' . $th->getMessage(),
            ], 500);
        }
    }


    public function edit($id)
    {
        try {
            $data_actualite = Actualite::find($id);

            //get Image from database
            $galerie = [];

            foreach ($data_actualite->getMedia('galerie') as $value) {
                // Read the file content
                $fileContent = file_get_contents($value->getPath());

                // Encode the file content to base64
                $base64File = base64_encode($fileContent);
                array_push($galerie, $base64File);
            }

            // dd($galerie);

            $id = $id;

            return view('backend.pages.actualite.edit', compact('data_actualite', 'id', 'galerie'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function update(Request $request, $id)
    {

        try {
            //request validation ......
            // dd($request->all());

            $request->validate([
                'status' => 'required|string',
                'titre' => 'required|string',
                'description' => '',
                'draft_token' => 'required|string',
                'image_une' => 'image|max:1024',

            ]);

            $actualite = tap(Actualite::find($id))->update([
                'titre' => $request['titre'],
                'status' => $request['status'],
                'description' => $request['description'],
                'vedette' => $request['vedette'],
                'status' => $request['status'],
                'date_publication' => $request['date_publication'],
            ]);


            // image a la une
            if (request()->hasFile('image_une')) {
                $actualite->clearMediaCollection('image');
                $actualite->addMediaFromRequest('image_une')->toMediaCollection('image');
            }



            // gallery d'images 1 ou plusieurs
            if (request()->filled('galerie')) {
                $actualite->clearMediaCollection('galerie');

                foreach ($request->input('galerie') as $fileData) {
                    // Décoder l'image base64
                    $fileData = explode(',', $fileData);
                    $fileExtension = explode('/', explode(';', $fileData[0])[0])[1];
                    $decodedFile = base64_decode($fileData[1]);

                    // Créer un fichier temporaire
                    $tempFilePath = sys_get_temp_dir() . '/' . uniqid() . '.' . $fileExtension;
                    file_put_contents($tempFilePath, $decodedFile);

                    // Ajouter l'image à la collection de médias
                    $media = $actualite->addMedia($tempFilePath)->toMediaCollection('galerie');

                    // Optimiser l'image après l'ajout
                    \Spatie\ImageOptimizer\OptimizerChainFactory::create()->optimize($media->getPath());
                }
            }


            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Actualite::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($actualite) {
                    $media->model_id = $actualite->id;
                    $media->save();
                });

            // Réponse en cas de succès
            return response()->json([
                'success' => true,
                'message' => 'Actualité modifié avec succès',
                'data' => $actualite->with('media')->first()
            ], 201);
        } catch (\Throwable $th) {
            // Réponse en cas d'erreur
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la modification de l\'actualité : ' . $th->getMessage(),
            ], 500);
        }
    }


    public function delete($id)
    {
        Actualite::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
