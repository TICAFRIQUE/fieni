<?php

namespace App\Http\Controllers\backend;

use App\Models\Programme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProgrammeController extends Controller
{
    //

    public function index()
    {
        try {
            $data_programme = Programme::get();

            return view('backend.pages.programme.index', compact('data_programme'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function create(Request $request)
    {
        return view('backend.pages.programme.create');
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

        $fakeprogramme = new Programme();
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

            $request->validate([
                'status' => 'required|string',
                'description' => 'required|string',
                'draft_token' => 'required|string',
                'image' => 'nullable|image|max:1024',
            ]);

            $programme = Programme::create([
                'status' => $request->status,
                'description' => $request->description,
            ]);

            if ($request->hasFile('image')) {
                $programme->addMediaFromRequest('image')->toMediaCollection('image');
            }

            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Programme::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($programme) {
                    $media->model_id = $programme->id;
                    $media->save();
                });

            Alert::success('Succès', 'Présentation enregistrée avec images.');
            return back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function edit($id)
    {
        try {
            $data_programme = Programme::find($id);

            return view('backend.pages.programme.edit', compact('data_programme'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function update(Request $request, $id)
    {

        try {
            //request validation ......

            $data_programme = tap(Programme::find($id))->update([
                'status' => $request['status'],
                'description' => $request['description'],
            ]);

            if (request()->hasFile('image')) {
                $data_programme->clearMediaCollection('image');
                $data_programme->addMediaFromRequest('image')->toMediaCollection('image');
            }

            Alert::success('Opération réussi', 'Success Message');
            return back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function delete($id)
    {
        try {
            Programme::find($id)->delete();
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Throwable $th) {

            return $th->getMessage();
        }
    }
}
