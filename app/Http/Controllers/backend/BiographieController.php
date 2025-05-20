<?php

namespace App\Http\Controllers\backend;

use App\Models\Biographie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BiographieController extends Controller
{
    //

    public function index()
    {
        $data_biographie = Biographie::get();

        return view('backend.pages.biographie.index', compact('data_biographie'));
    }


    public function create(Request $request)
    {
        return view('backend.pages.biographie.create');
    }



    /**
     * Enregistre une image pour TinyMCE via une requête Ajax.
     * Le champ 'draft_token' est utilisé pour lier l'image à un enregistrement "draft" de Biographie enregistré en base.
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

        $fakebiographie = new Biographie();
        $fakebiographie->id = 0; // modèle fictif
        $fakebiographie->exists = true;

        $media = $fakebiographie->addMediaFromRequest('file')
            ->usingFileName(time() . '_' . $request->file('file')->getClientOriginalName())
            ->withCustomProperties(['draft_token' => $request->draft_token])
            ->toMediaCollection('tiny-images');

        return response()->json([
            'location' => $media->getUrl(),
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'description' => 'required|string',
            'draft_token' => 'required|string',
            'image' => 'nullable|image|max:1024',
        ]);

        $biographie = Biographie::create([
            'status' => $request->status,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $biographie->addMediaFromRequest('image')->toMediaCollection('image');
        }

        // Associer les images TinyMCE au modèle enregistré
        Media::where('custom_properties->draft_token', $request->draft_token)
            ->where('model_type', Biographie::class)
            ->where('model_id', 0)
            ->get()
            ->each(function ($media) use ($biographie) {
                $media->model_id = $biographie->id;
                $media->save();
            });

        Alert::success('Succès', 'Présentation enregistrée avec images.');
        return back();
    }



    public function edit($id)
    {
        $data_biographie = Biographie::find($id);

        return view('backend.pages.biographie.edit', compact('data_biographie'));
    }



    public function update(Request $request, $id)
    {

        //request validation ......

        $data_biographie = tap(Biographie::find($id))->update([
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            $data_biographie->clearMediaCollection('image');
            $data_biographie->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }


    public function delete($id)
    {
        Biographie::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
