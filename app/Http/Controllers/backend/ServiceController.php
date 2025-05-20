<?php

namespace App\Http\Controllers\backend;

use App\Models\chantier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class chantierController extends Controller
{

    public function index()
    {
        $data_chantier = chantier::get();

        return view('backend.pages.chantier.index', compact('data_chantier'));
    }


    public function create(Request $request)
    {
        return view('backend.pages.chantier.create');
    }


    public function store(Request $request)
    {
        //request validation .....
        // dd($request->all());

        // verifier si le chantier existe en base de données
        $condition = chantier::where('titre', $request['titre'])->exists();


        if ($condition) {
            return back()->with('error', 'Le chantier existe deja');
        }

        $data_chantier = chantier::firstOrCreate([
            'titre' => $request['titre'],
            // 'lien' => $request['lien'],
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            $data_chantier->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::Success('Opération', 'SuccessMessage');
        return back();
    }


    public function edit($id)
    {
        $data_chantier = chantier::find($id);

        return view('backend.pages.chantier.edit', compact('data_chantier'));
    }



    public function update(Request $request, $id)
    {

        //request validation ......

        $data_chantier = tap(chantier::find($id))->update([
            'titre' => $request['titre'],
            // 'lien' => $request['lien'],
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            $data_chantier->clearMediaCollection('image');
            $data_chantier->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }


    public function delete($id)
    {
        chantier::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
