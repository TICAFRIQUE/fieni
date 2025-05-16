<?php

namespace App\Http\Controllers\backend;

use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PresentationController extends Controller
{
    //

    public function index()
    {
        $data_presentation = Presentation::get();

        return view('backend.pages.presentation.index', compact('data_presentation'));
    }


    public function create(Request $request)
    {
        return view('backend.pages.presentation.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'description' => 'required|string',
            'draft_token' => 'required|string',
            'image' => 'nullable|image|max:1024',
        ]);

        $presentation = Presentation::create([
            'status' => $request->status,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $presentation->addMediaFromRequest('image')->toMediaCollection('image');
        }

        // Associer les images TinyMCE au modèle enregistré
        Media::where('custom_properties->draft_token', $request->draft_token)
            ->where('model_type', Presentation::class)
            ->where('model_id', 0)
            ->get()
            ->each(function ($media) use ($presentation) {
                $media->model_id = $presentation->id;
                $media->save();
            });

        Alert::success('Succès', 'Présentation enregistrée avec images.');
        return back();
    }

    public function uploadFromTinyMCE(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:1024',
            'draft_token' => 'required|string',
        ]);

        $fakePresentation = new Presentation();
        $fakePresentation->id = 0; // modèle fictif
        $fakePresentation->exists = true;

        $media = $fakePresentation->addMediaFromRequest('file')
            ->usingFileName(time() . '_' . $request->file('file')->getClientOriginalName())
            ->withCustomProperties(['draft_token' => $request->draft_token])
            ->toMediaCollection('tiny-images');

        return response()->json([
            'location' => $media->getUrl(),
        ]);
    }


    public function edit($id)
    {
        $data_presentation = Presentation::find($id);

        return view('backend.pages.presentation.edit', compact('data_presentation'));
    }



    public function update(Request $request, $id)
    {

        //request validation ......

        $data_presentation = tap(Presentation::find($id))->update([
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            $data_presentation->clearMediaCollection('image');
            $data_presentation->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }


    public function delete($id)
    {
        Presentation::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
