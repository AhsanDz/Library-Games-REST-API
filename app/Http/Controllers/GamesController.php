<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    // POST /api/games
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        // untuk memastikan format dan aturan yang sesuai
        try {
            $validated = $request->validate([
                'Id' => 'required|digits:15',
                'name' => 'required|string|max:50',
                'Feature' => 'required|array',
                    'Feature.single_player' => 'required|boolean',
                    'Feature.multiplayer' => 'required|boolean',
                    'Feature.achievement' => 'required|boolean',
                    'Feature.steam_cloud' => 'required|boolean',
                    'Feature.controller_support' => 'required|boolean',
                    'Feature.Remote_Play_On_Phone' => 'required|boolean',
                    'Feature.Remote_Play_On_Tablet' => 'required|boolean',
                    'Feature.Remote_Play_On_TV' => 'required|boolean',
                    'Feature.family_sharing' => 'required|boolean',
                'genre' => 'sometimes|required|array'
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {

            // Mengembalikan error validasi dalam format JSON dan status 422
            return response()->json([
                "message" => "Validation failed",
                "errors" => $th->validator->errors()
            ], 422);
        }

        // Manipulasi data dalam basis data
        // Dipelajari setelah mendapatkan materi DDL dan DML di Basis Data

        // Mengembalikan respons dalam format JSON
        return response()->json([
            "message" => "Game created successfully (dummy)",
            "data" => $validated
        ], 201);
    }
}
