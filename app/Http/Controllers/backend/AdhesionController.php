<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Adhesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


    //insertDataFromCsv

    /**
     * Nettoie un champ : supprime les caractères non UTF-8 valides, remplace les apostrophes et trim.
     */
    private function cleanString($string)
    {
        // Convertir en UTF-8 valide
        $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');

        // Remplacer les apostrophes typographiques par des apostrophes simples
        $string = str_replace(['’', '‘', '“', '”', '…'], ["'", "'", '"', '"', '...'], $string);

        // Supprimer les caractères non imprimables
        $string = preg_replace('/[^\P{C}\n]+/u', '', $string);

        // Supprimer les balises HTML, si jamais
        $string = strip_tags($string);

        return trim($string);
    }



    public function insertDataFromCsv(Request $request)
    {
        $filePath = storage_path('app/membre.csv');

        if (!file_exists($filePath)) {
            return response()->json([
                'status' => 404,
                'message' => 'Le fichier CSV n\'existe pas.'
            ]);
        }

        $batchSize = 500;
        $rowsToInsert = [];

        if (($handle = fopen($filePath, 'r')) !== false) {
            $headers = fgetcsv($handle, 1000, ';');

            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                if (count($data) !== count($headers)) {
                    continue;
                }
                // Nettoyage des données
                $data = array_map([$this, 'cleanString'], $data);

                $row = array_combine($headers, $data);

                // Nettoyage des champs
                if (isset($row['contact'])) {
                    $row['contact'] = preg_replace('/\D/', '', $row['contact']); // garde uniquement les chiffres
                }

                if (isset($row['genre'])) {
                    $genreMap = [
                        'M' => 'monsieur',
                        'Mme' => 'madame',
                        'Mlle' => 'mademoiselle',
                        'genre' => 'monsieur'


                    ];

                    $row['genre'] = $genreMap[$row['genre']] ?? 'monsieur'; // valeur par défaut si non trouvé
                }

                $row = array_map('trim', $row);

                $now = Carbon::now();
                $row['created_at'] = $now;
                $row['updated_at'] = $now;

                $rowsToInsert[] = $row;

                // Dès qu'on atteint $batchSize, on insère et on vide le tableau
                if (count($rowsToInsert) === $batchSize) {
                    DB::table('adhesions')->insert($rowsToInsert);
                    $rowsToInsert = [];
                }
            }

            // Insérer le reste
            if (!empty($rowsToInsert)) {
                DB::table('adhesions')->insert($rowsToInsert);
            }

            fclose($handle);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Les données ont été insérées avec succès.'
        ]);
    }
}
