<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReferenceController extends Controller
{

    public function index()
    {
        $data_reference = Reference::get();

        return view('backend.pages.reference.index', compact('data_reference'));
    }


    public function create(Request $request)
    {
        return view('backend.pages.reference.create');
    }


    public function store(Request $request)
    {
        //request validation .....
        // dd($request->all());
        $data_reference = Reference::create([
            // 'titre' => $request['titre'],
            'lien' => $request['lien'],
            'status' => $request['status'],
            // 'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            // $data_reference->clearMediaCollection('serviceImage');
            $data_reference->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::Success('Opération', 'SuccessMessage');
        return back();
    }


    public function edit($id)
    {
        $data_reference = Reference::find($id);

        return view('backend.pages.reference.edit', compact('data_reference'));
    }



    public function update(Request $request, $id)
    {

        //request validation ......

        $data_reference = tap(Reference::find($id))->update([
            // 'titre' => $request['titre'],
            'lien' => $request['lien'],
            'status' => $request['status'],
            // 'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            $data_reference->clearMediaCollection('image');
            $data_reference->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }


    public function delete($id)
    {
        Reference::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
