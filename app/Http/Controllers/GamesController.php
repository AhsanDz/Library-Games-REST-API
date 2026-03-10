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
        // Mengembalikan respons dalam format JSON
        return response()->json([
            "message" => "Game created successfully (dummy)",
            "data" => $validated
        ], 201);
    }

    // GET /api/Games
    public function index()
    {
        // Ambil data dalam basis data
        // Sementara menggunakan json dummy
        $games = [
            [
                "id" => "000000000000001",
                "name" => "Hollow Knight",
                "feature" => [
                    "single_player" => true,
                    "multiplayer" => false,
                    "achievement" => true,
                    "steam_cloud" => true,
                    "controller_support" => true,
                    "Remote_Play_On_Phone" => true,
                    "Remote_Play_On_Tablet" => true,
                    "Remote_Play_On_TV" => true,
                    "family_sharing" => true
                ],
                "genre" => ["Metroidvania", "Platformer", "Souls-like"]
            ],
            [
                "id" => "000000000000002",
                "name" => "Stardew Valley",
                "feature" => [
                    "single_player" => true,
                    "multiplayer" => true,
                    "achievement" => true,
                    "steam_cloud" => true,
                    "controller_support" => true,
                    "Remote_Play_On_Phone" => true,
                    "Remote_Play_On_Tablet" => true,
                    "Remote_Play_On_TV" => true,
                    "family_sharing" => true
                ],
                "genre" => ["Simulation", "Indie"]
            ]
        ];
        // Mengembalikan respons dalam format JSON
        return response()->json($games);
    }

    // GET /api/games/{id}
    public function show($id)
    {
        $game = [
            "id" => $id,
            "name" => "Hollow Knight",
            "feature" => [
                "single_player" => true,
                "multiplayer" => false,
                "achievement" => true,
                "steam_cloud" => true,
                "controller_support" => true,
                "Remote_Play_On_Phone" => true,
                "Remote_Play_On_Tablet" => true,
                "Remote_Play_On_TV" => true,
                "family_sharing" => true        
            ],
            "genre" => ["Metroidvania", "Platformer", "Souls-like"]
        ];
        // Mengembalikan respons dalam format JSON
        return response()->json($game);
    }

        // PUT and PATCH /api/games/{id}
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari request
        // untuk memastikan format dan aturan yang sesuai
        try {
            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:50',
                'feature' => 'sometimes|required|array',
                'feature.single_player' => 'sometimes|boolean',
                'feature.multiplayer' => 'sometimes|boolean',
                'feature.achievement' => 'sometimes|boolean',
                'feature.steam_cloud' => 'sometimes|boolean',
                'feature.controller_support' => 'sometimes|boolean',
                'feature.Remote_Play_On_Phone' => 'sometimes|boolean',
                'feature.Remote_Play_On_Tablet' => 'sometimes|boolean',
                'feature.Remote_Play_On_TV' => 'sometimes|boolean',
                'feature.family_sharing' => 'sometimes|boolean',

            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return response()->json([
                "message" => "Validation failed",
                "errors" => $th->validator->errors()
            ], 422);
        }

        return response()->json([
            "message" => "Game {$id} updated successfully (dummy)",
            "data" => array_merge(['id' => $id], $validated)
        ]);
    }
}
