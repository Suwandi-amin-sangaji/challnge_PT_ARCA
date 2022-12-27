<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //get all posts from Models
        $posts = Post::latest()->get();
        //return view with data
        return view('posts', compact('posts'));
    }
    public function store(Request $request)
    {
        $pesan = [
            'required' => 'Wajib Diisi',
            // 'max' => 'max 100%',
            // 'min' => 'min 1%',
            'equal' => 'pembagian bonus masih salah',
        ];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'totalBonus' => 'required',
            'percentage' => 'required',
            'percentage2' => 'required',
            'percentage3' => 'required',
        ], $pesan);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post = Post::create([
            'totalBonus'     => $request->totalBonus,
            'percentage'   => $request->percentage,
            'percentage2'   => $request->percentage2,
            'percentage3'   => $request->percentage3,
            'payment'   => $request->payment,
            'payment2'   => $request->payment2,
            'payment3'   => $request->payment3,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $post
        ]);
    }


    public function show(Post $post)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $post
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $pesan = [
            'required' => 'Wajib Diisi',
            // 'max' => 'max 100%',
            // 'min' => 'min 1%',
        ];
        //define validation rules
        $validator = Validator::make($request->all(), [
            'totalBonus' => 'required',
            'percentage' => 'required',
            'percentage2' => 'required',
            'percentage3' => 'required',
        ], $pesan);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post->update([
            'totalBonus'     => $request->totalBonus,
            'percentage'   => $request->percentage,
            'percentage2'   => $request->percentage2,
            'percentage3'   => $request->percentage3,
            'payment'   => $request->payment,
            'payment2'   => $request->payment2,
            'payment3'   => $request->payment3,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $post
        ]);
    }


    public function destroy($id)
    {
        //delete post by ID
        Post::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]);
    }
}