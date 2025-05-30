<?php

namespace App\Http\Controllers\backend;

use App\Models\Temoignage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class temoignageController extends Controller
{
    //

    public function index()
    {
        $data_temoignage = Temoignage::active()->get();

        return view('backend.pages.temoignage.index', compact('data_temoignage'));
    }


    public function create(Request $request)
    {
        return view('backend.pages.temoignage.create');
    }



    /**
     * Enregistre une image pour TinyMCE via une requête Ajax.
     * Le champ 'draft_token' est utilisé pour lier l'image à un enregistrement "draft" de temoignage enregistré en base.
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

        $faketemoignage = new Temoignage();
        $faketemoignage->id = 0; // modèle fictif
        $faketemoignage->exists = true;

        $media = $faketemoignage->addMediaFromRequest('file')
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

            $temoignage = Temoignage::firstOrcreate([
                'status' => $request->status,
                'nom' => $request->nom ?? 'Anonyme',
                'fonction' => $request->fonction ?? 'Anonyme',
                'description' => $request->description,
            ]);

            if ($request->hasFile('image')) {
                $temoignage->addMediaFromRequest('image')->toMediaCollection('image');
            }

            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Temoignage::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($temoignage) {
                    $media->model_id = $temoignage->id;
                    $media->save();
                });

            Alert::Success('Opération', 'SuccessMessage');
            return redirect()->route('temoignage.index')->with('success', 'Temoignage créé avec succès.');

        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }



    public function edit($id)
    {
        $data_temoignage = Temoignage::findOrFail($id);

        return view('backend.pages.temoignage.edit', compact('data_temoignage'));
    }



    public function update(Request $request, $id)
    {

        try {

            $data_temoignage = tap(Temoignage::find($id))->update([
                'status' => $request->status,
                'nom' => $request->nom ?? 'Anonyme',
                'fonction' => $request->fonction ?? 'Anonyme',
                'description' => $request->description,
            ]);

            if (request()->hasFile('image')) {
                $data_temoignage->clearMediaCollection('image');
                $data_temoignage->addMediaFromRequest('image')->toMediaCollection('image');
            }

            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Temoignage::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($data_temoignage) {
                    $media->model_id = $data_temoignage->id;
                    $media->save();
                });

            Alert::success('Opération réussi', 'Success Message');
            return redirect()->route('temoignage.index')->with('success', 'Temoignage modifié avec succès.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }

        //request validation ......

    }


    public function delete($id)
    {
        Temoignage::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
