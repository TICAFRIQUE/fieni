<?php

namespace App\Http\Controllers\backend;

use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

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
        //request validation .....
        // dd($request->all());
        $data_presentation = Presentation::create([
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            // $data_presentation->clearMediaCollection('serviceImage');
            $data_presentation->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::Success('Opération', 'SuccessMessage');
        return back();
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
