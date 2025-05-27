<?php

namespace App\Http\Controllers\backend;

use App\Models\Parrainage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParrainageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data_parrainage = Parrainage::orderBy('created_at', 'desc')->get();
            return view('backend.pages.parrainage.index', compact('data_parrainage'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors de la récupération des parrainages : ' . $th->getMessage());
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
        Parrainage::find($id)->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
