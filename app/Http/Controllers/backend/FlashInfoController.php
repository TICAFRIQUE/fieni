<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FlashInfo;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FlashInfoController extends Controller
{
    //

    public function index()
    {
        $data_flash = FlashInfo::get();

        return view('backend.pages.flash-info.index', compact('data_flash'));
    }


    public function create(Request $request)
    {
        return view('backend.pages.flash-info.create');
    }



    /**
     * Enregistre une image pour TinyMCE via une requête Ajax.
     * Le champ 'draft_token' est utilisé pour lier l'image à un enregistrement "draft" de FlashInfo enregistré en base.
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

        $fakeflash_info = new FlashInfo();
        $fakeflash_info->id = 0; // modèle fictif
        $fakeflash_info->exists = true;

        $media = $fakeflash_info->addMediaFromRequest('file')
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
                // 'image' => 'nullable|image|max:1024',
            ]);

            $FlashInfo = FlashInfo::create([
                'status' => $request->status,
                'description' => $request->description,
            ]);

            // if ($request->hasFile('image')) {
            //     $FlashInfo->addMediaFromRequest('image')->toMediaCollection('image');
            // }

            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', FlashInfo::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($FlashInfo) {
                    $media->model_id = $FlashInfo->id;
                    $media->save();
                });

            Alert::Success('Opération', 'SuccessMessage');

            return back();
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }



    public function edit($id)
    {
        $data_flash = FlashInfo::find($id);

        return view('backend.pages.flash-info.edit', compact('data_flash'));
    }



    public function update(Request $request, $id)
    {

        try {

            $data_flash = tap(FlashInfo::find($id))->update([
                'status' => $request['status'],
                'description' => $request['description'],
            ]);

            // if (request()->hasFile('image')) {
            //     $data_flash->clearMediaCollection('image');
            //     $data_flash->addMediaFromRequest('image')->toMediaCollection('image');
            // }

            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', FlashInfo::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($data_flash) {
                    $media->model_id = $data_flash->id;
                    $media->save();
                });

            Alert::Success('Opération', 'SuccessMessage');
            return back();
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }

        //request validation ......

    }


    public function delete($id)
    {
        FlashInfo::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
