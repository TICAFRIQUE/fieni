<?php

namespace App\Http\Controllers\backend;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VideoController extends Controller
{
    //
    public function index()
    {
        try {
            $data_video = Video::active()->orderBy('position', 'asc')->get();
            return view('backend.pages.video.index', compact('data_video'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error',  $e->getMessage());
        }
    }
    public function create()
    {
        try {
            return view('backend.pages.video.create');
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

        $fakedata = new Video();
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
                'titre' => 'required|string',
                'description' => '',
                'lien' => 'required|string',
                'draft_token' => 'required|string',
                'status' => 'required',
                'vedette' => 'nullable',
                'position' => 'nullable',
            ]);

            // pour incrementer la position
            $data_count = Video::count();

            $Video = Video::firstOrCreate([
                'titre' => $request['titre'],
                'description' => $request['description'],
                'lien' => $request['lien'],
                'status' => $request['status'],
                'vedette' => $request['vedette'],
                'position' => $data_count + 1,
            ]);



            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Video::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($Video) {
                    $media->model_id = $Video->id;
                    $media->save();
                });


            // Réponse en cas de succès
            Alert::success('Opération réussi', 'Success Message');
            return redirect()->route('video.index')->with('success', 'Video créé avec succès');
        } catch (\Throwable $th) {
            // Réponse en cas d'erreur
            return back()->with('error', 'Erreur lors de la création de la Video : ' . $th->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $data_video = Video::findOrFail($id);


            // recuperer toutes les videos
            $videos_count = Video::count();

            // dd($data_Video->toArray());

            return view('backend.pages.video.edit', compact('data_video', 'videos_count'));
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
                'titre' => 'required|string',
                'description' => '',
                'lien' => 'required|string',
                'draft_token' => 'required|string',
                'status' => 'required',
                'vedette' => 'nullable',
                'position' => 'nullable',
            ]);


            $Video = tap(Video::find($id))->update([
                'titre' => $request['titre'],
                'description' => $request['description'],
                'lien' => $request['lien'],
                'status' => $request['status'],
                'vedette' => $request['vedette'],
                'position' => $request['position'],
            ]);


            // Associer les images TinyMCE au modèle enregistré
            Media::where('custom_properties->draft_token', $request->draft_token)
                ->where('model_type', Video::class)
                ->where('model_id', 0)
                ->get()
                ->each(function ($media) use ($Video) {
                    $media->model_id = $Video->id;
                    $media->save();
                });

            // Réponse en cas de succès
            Alert::success('Opération réussi', 'Success Message');
            return redirect()->route('video.index')->with('success', 'Video modifié avec succès');
        } catch (\Throwable $th) {
            // Réponse en cas d'erreur
            return back()->with('error', 'Erreur lors de la modification de la Video : ' . $th->getMessage());
        }
    }


    public function delete($id)
    {
        // Video::find($id)->delete();
        // // reorganiser l'ordre la position
        // $data_count = Video::count();// count the number of records
        // Video::where('id', '>', $id)->decrement('position');
        // return response()->json([
        //     'status' => 200,
        // ]);


        $video = Video::findOrFail($id);
        $deletedPosition = $video->position;
        $video->delete();

        // Réorganiser les positions : toutes celles après la supprimée
        Video::where('position', '>', $deletedPosition)->decrement('position');

        return response()->json([
            'status' => 200,
        ]);
    }
}
