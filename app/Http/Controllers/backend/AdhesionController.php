<?php

namespace App\Http\Controllers\backend;

use App\Models\Adhesion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdhesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data_membre = Adhesion::orderBy('created_at', 'desc')->get();
            return view('backend.pages.adhesion_membre.index', compact('data_membre'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération des adhésions : ' . $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        Adhesion::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
