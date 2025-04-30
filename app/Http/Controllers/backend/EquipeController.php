<?php

namespace App\Http\Controllers\backend;

use App\Models\Equipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class EquipeController extends Controller
{
    //

    public function index()
    {

        $data_equipe = Equipe::with('media')->get();

        return view('backend.pages.equipe.index', compact('data_equipe'));
    }


    public function store(Request $request)
    {
        //request validation .......

        $data_equipe = Equipe::firstOrCreate([
            'nom' => $request['nom'],
            'job' => $request['job'],
            'description' => $request['description'],
            'status' => $request['status'],
        ]);

        if (request()->hasFile('image')) {
            $data_equipe->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::success('Operation réussi', 'Success Message');

        return back();
    }


    public function update(Request $request, $id)
    {

        //request validation ......

        $data_equipe = tap(Equipe::find($id))->update([
            'nom' => $request['nom'],
            'job' => $request['job'],
            'description' => $request['description'],
            'status' => $request['status'],
        ]);

        if (request()->hasFile('image')) {
            $data_equipe->clearMediaCollection('image');
            $data_equipe->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }


    public function delete($id)
    {
        Equipe::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
