<?php

namespace App\Http\Controllers\backend;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AgendaController extends Controller
{
    //
    public function index()
    {
        try {
            $data_agenda = Agenda::public()->orderBy('created_at', 'desc')->get();
            return view('backend.pages.agenda.index', compact('data_agenda'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error',  $e->getMessage());
        }
    }
    public function create()
    {
        try {
            return view('backend.pages.agenda.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error',  $e->getMessage());
        }
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

        $fakedata = new Agenda();
        $fakedata->id = 0; // modèle fictif
        $fakedata->exists = true;

        $media = $fakedata->addMediaFromRequest('file')
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
                'is_public' => 'required|boolean',
                'titre' => 'required|string',
                'description' => '',
                'date_debut' => 'required|date',
                'date_fin' => 'nullable|date',
                'lieu' => 'nullable|string',
                'type' => 'nullable|string',
                'draft_token' => 'required|string',
                'image_une' => 'required|image|max:1024',

            ]);


            $agenda = Agenda::firstOrCreate([
                'titre' => $request['titre'],
                'description' => $request['description'],
                'is_public' => $request['is_public'],
                'date_debut' => $request['date_debut'],
                'date_fin' => $request['date_fin'],
                'lieu' => $request['lieu'],
                'type' => $request['type']
            ]);

            // image a la une
            if (request()->hasFile('image_une')) {
                $agenda->addMediaFromRequest('image_une')->toMediaCollection('image_une');
            }

            // image de la page detail
            if (request()->hasFile('image_detail')) {
                $agenda->addMediaFromRequest('image_detail')->toMediaCollection('image_detail');
            }

            // gallery d'images 1 ou plusieurs
            // if (request()->filled('galerie')) {

            //     foreach ($request->input('galerie') as $fileData) {
            //         // Décoder l'image base64
            //         $fileData = explode(',', $fileData);
            //         $fileExtension = explode('/', explode(';', $fileData[0])[0])[1];
            //         $decodedFile = base64_decode($fileData[1]);

            //         // Créer un fichier temporaire
            //         $tempFilePath = sys_get_temp_dir() . '/' . uniqid() . '.' . $fileExtension;
            //         file_put_contents($tempFilePath, $decodedFile);

            //         // Ajouter l'image à la collection de médias
            //         $media = $agenda->addMedia($tempFilePath)->toMediaCollection('galerie');

            //         // Optimiser l'image après l'ajout
            //         \Spatie\ImageOptimizer\OptimizerChainFactory::create()->optimize($media->getPath());
            //     }
            // }


            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Agenda::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($agenda) {
                    $media->model_id = $agenda->id;
                    $media->save();
                });


            // Réponse en cas de succès
            return response()->json([
                'success' => true,
                'message' => 'Agenda créé avec succès',
                'data' => $agenda->with('media')->first()
            ], 201);
        } catch (\Throwable $th) {
            // Réponse en cas d'erreur
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de l\'agenda : ' . $th->getMessage(),
            ], 500);
        }
    }


    public function edit($id)
    {
        try {
            $data_agenda = Agenda::findOrFail($id);

            //get Image from database
            $galerie = [];

            foreach ($data_agenda->getMedia('galerie') as $value) {
                // Read the file content
                $fileContent = file_get_contents($value->getPath());

                // Encode the file content to base64
                $base64File = base64_encode($fileContent);
                array_push($galerie, $base64File);
            }

            // dd($galerie);

            $id = $id;

            // dd($data_agenda->toArray());

            return view('backend.pages.agenda.edit', compact('data_agenda' , 'id' , 'galerie'));
        } catch (\Throwable $th) {
            return back()->with('error',  $th->getMessage());
        }
    }



    public function update(Request $request, $id)
    {

        try {
            //request validation ......
            // dd($request->all());

            $request->validate([
                'is_public' => 'required|boolean',
                'titre' => 'required|string',
                'description' => '',
                'date_debut' => 'required|date',
                'date_fin' => 'nullable|date',
                'lieu' => 'nullable|string',
                'type' => 'nullable|string',
                'draft_token' => 'required|string',
                'image_une' => 'nullable|image|max:1024',

            ]);


          $agenda = tap(Agenda::find($id))->update([
                'titre' => $request['titre'],
                'description' => $request['description'],
                'is_public' => $request['is_public'],
                'date_debut' => $request['date_debut'],
                'date_fin' => $request['date_fin'],
                'lieu' => $request['lieu'],
                'type' => $request['type']
            ]);


            // image a la une
            if (request()->hasFile('image_une')) {
                $agenda->clearMediaCollection('image_une');
                $agenda->addMediaFromRequest('image_une')->toMediaCollection('image_une');
            }

            // image de la page detail
            if (request()->hasFile('image_detail')) {
                $agenda->clearMediaCollection('image_detail');
                $agenda->addMediaFromRequest('image_detail')->toMediaCollection('image_detail');
            }



            // gallery d'images 1 ou plusieurs
            // if (request()->filled('galerie')) {
            //     $agenda->clearMediaCollection('galerie');

            //     foreach ($request->input('galerie') as $fileData) {
            //         // Décoder l'image base64
            //         $fileData = explode(',', $fileData);
            //         $fileExtension = explode('/', explode(';', $fileData[0])[0])[1];
            //         $decodedFile = base64_decode($fileData[1]);

            //         // Créer un fichier temporaire
            //         $tempFilePath = sys_get_temp_dir() . '/' . uniqid() . '.' . $fileExtension;
            //         file_put_contents($tempFilePath, $decodedFile);

            //         // Ajouter l'image à la collection de médias
            //         $media = $agenda->addMedia($tempFilePath)->toMediaCollection('galerie');

            //         // Optimiser l'image après l'ajout
            //         \Spatie\ImageOptimizer\OptimizerChainFactory::create()->optimize($media->getPath());
            //     }
            // }


            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Agenda::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($agenda) {
                    $media->model_id = $agenda->id;
                    $media->save();
                });

            // Réponse en cas de succès
            return response()->json([
                'success' => true,
                'message' => 'Agenda modifié avec succès',
                'data' => $agenda->with('media')->first()
            ], 201);
        } catch (\Throwable $th) {
            // Réponse en cas d'erreur
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la modification de l\'agenda : ' . $th->getMessage(),
            ], 500);
        }
    }


    public function delete($id)
    {
        Agenda::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
