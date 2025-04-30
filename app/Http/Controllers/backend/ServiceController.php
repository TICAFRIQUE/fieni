<?php

namespace App\Http\Controllers\backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{

    public function index()
    {
        $data_service = Service::get();

        return view('backend.pages.service.index', compact('data_service'));
    }


    public function create(Request $request)
    {
        return view('backend.pages.service.create');
    }


    public function store(Request $request)
    {
        //request validation .....
        // dd($request->all());

        // verifier si le service existe en base de données
        $condition = Service::where('titre', $request['titre'])->exists();


        if ($condition) {
            return back()->with('error', 'Le service existe deja');
        }

        $data_service = Service::firstOrCreate([
            'titre' => $request['titre'],
            // 'lien' => $request['lien'],
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            $data_service->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::Success('Opération', 'SuccessMessage');
        return back();
    }


    public function edit($id)
    {
        $data_service = Service::find($id);

        return view('backend.pages.service.edit', compact('data_service'));
    }



    public function update(Request $request, $id)
    {

        //request validation ......

        $data_service = tap(Service::find($id))->update([
            'titre' => $request['titre'],
            // 'lien' => $request['lien'],
            'status' => $request['status'],
            'description' => $request['description'],
        ]);

        if (request()->hasFile('image')) {
            $data_service->clearMediaCollection('image');
            $data_service->addMediaFromRequest('image')->toMediaCollection('image');
        }

        Alert::success('Opération réussi', 'Success Message');
        return back();
    }


    public function delete($id)
    {
        Service::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
