<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    public function getAll(){
        $komentars = Comment::lazy();

        try{
            return response()->json([
            'status' => true,
            'message' => "Data komentar berhasil di ambil",
            'data' => $komentars
            ], 200);
        } catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => "Terjadi kesalahan : ". $e,
                'data' => []
            ], 403);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'komentar' => 'required'
        ]);

        try {
            $data = Comment::create([
                'nama' => $request->name,
                'email' => $request->email,
                'komentar' => $request->komentar
            ]);

            return response()->json([
                'status' => true,
                'message' => "Input komentar berhasil",
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 403);
        }
    }
}
