<?php

namespace App\Http\Controllers\backend;

use App\Models\MotDirecteur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MotDirecteurController extends Controller
{
    //
    public function index()
    {
        $data_mot_directeur = MotDirecteur::get();

        return view('backend.pages.mot-directeur.index', compact('data_mot_directeur'));
    }


    public function create(Request $request)
    {
        return view('backend.pages.mot-directeur.create');
    }


    public function store(Request $request)
    {
        //request validation .....
        // dd($request->all());
        $data_mot = MotDirecteur::create([
            'nom_directeur' => $request['nom_directeur'],
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            // $data_mot->clearMediaCollection('serviceImage');
            $data_mot->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::Success('Opération', 'SuccessMessage');
        return back();
    }


    public function edit($id)
    {
        $data_mot = MotDirecteur::find($id);

        return view('backend.pages.mot-directeur.edit', compact('data_mot'));
    }



    public function update(Request $request, $id)
    {

        //request validation ......

        $data_mot = tap(MotDirecteur::find($id))->update([
            'nom_directeur' => $request['nom_directeur'],
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            $data_mot->clearMediaCollection('image');
            $data_mot->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }


    public function delete($id)
    {
        MotDirecteur::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
