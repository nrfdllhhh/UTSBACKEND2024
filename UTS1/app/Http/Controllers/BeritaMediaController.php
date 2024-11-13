<?php

namespace App\Http\Controllers;

use App\Models\BeritaMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaMediaController
{
    /**
     * Display a listing of the resource.
     */

    public function index() 
        { 
            $berita = BeritaMedia::all(); 
            if ($berita) { 
                $data = [ 
                    'message' => 'Get All Resource ', 
                    'data' => $berita 
                ]; 
                return response()->json($data, 200); 
            } else { 
                $data = [ 
                    'message' => 'Data is Empty', 
                    'data' => $berita 
                ]; 
                return response()->json($data, 200); 
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
            $validator = Validator::make($request->all(), [ 
                'title' => 'required', 
                'author' => 'required', 
                'description' => 'required', 
                'content' => 'required', 
                'url' => 'required', 
                'url_image' => 'required', 
                'published_at' => 'required', 
                'category' => 'required', 
            ]); 
                if ($validator->fails()) { 
                    return response()->json([ 
                        'message' => 'Validation errors', 
                        'errors' => $validator->errors(), 
                    ], 422); 
                } 
         
                $berita = BeritaMedia::create($request->all()); 
                 
                $data = [ 
                    'message' => 'Resource is added successfully', 
                    'data' => $berita, 
                ]; 
         
                return response()->json($data, 201); 
        } 
     
        /** 
         * Display the specified resource. 
         */ 
        public function show(string $id) 
        { 
            $berita = BeritaMedia::find($id); 
     
            if ($berita) { 
                $data = [ 
                    'message' => 'Get Detail Resource', 
                    'data' => $berita, 
                ]; 
                return response()->json($data, 200); 
            } else { 
                $data = [ 
                    'message' => 'Resource not found', 
                ]; 
                return response()->json($data, 404); 
            } 
        } 
     
        /** 
         * Show the form for editing the specified resource. 
         */ 
        public function edit(BeritaMedia $berita) 
        { 
             
        } 
     
        /** 
         * Update the specified resource in storage. 
         */ 
        public function update(Request $request, $id) 
        { 
            $berita = BeritaMedia::find($id); 
            if ($berita) { 
                $input = [ 
                    'id' => $request->id ?? $berita->id, 
                    'title' => $request->title ?? $berita->title, 
                    'author' => $request->author ?? $berita->author, 
                    'description' => $request->description ?? $berita->description, 
                    'content' => $request->content ?? $berita->content, 
                    'url' => $request->url ?? $berita->url,  
                    'url_image' => $request->url_image ?? $berita->url_image,                     
                    'published_at' => $request->published_at ?? $berita->published_at, 
                    'category' => $request->category ?? $berita->category 
                ]; 
                $berita->update($input); 
                $data = [ 
                    'message' => 'Resource is update successfully', 
                    'data' => $berita 
                ]; 
                return response()->json($data, 200); 
            } else { 
                $data = [ 
                    'message' => 'Resource not found' 
                ]; 
                return response()->json($data, 404); 
            } 
        } 
     
        /** 
         * Remove the specified resource from storage. 
         */ 
        public function destroy(string $id) 
        { 
            $berita = BeritaMedia::find($id); 
     
            if ($berita) { 
     
                $berita->delete(); 
     
                $data = [ 
                    'message' => 'Resource is delete success!!', 
                    'data' => $berita, 
                ]; 
     
                return response()->json($data, 200); 
            } else { 
                $data = [ 
                    'message' => 'Resource not found', 
                ]; 
     
                return
    
    response()->json($data, 404); 
            } 
        } 
     
        public function search(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'title' => 'required|string', 
        ]); 
     
        if ($validator->fails()) { 
            return response()->json([ 
                'message' => 'Validation errors', 
                'errors' => $validator->errors(), 
            ], 422); 
        } 
     
        $berita = BeritaMedia::where('title', 'like', '%' . $request->title . '%')->get(); 
     
        if ($berita->isEmpty()) { 
            return response()->json([ 
                'message' => 'Resource not found', 
            ], 404); 
        } 
     
        return response()->json([ 
            'message' => 'Resource found successfully', 
            'data' => $berita, 
        ], 200); 
    }

    public function sport() {
        $berita = BeritaMedia::where('category','sport')->get();
        return response()->json([
            'status' => 'Get Sport Resource',
            'data' => $berita

        ], 200);
    }
    public function finance() {
        $berita = BeritaMedia::where('category','finance')->get();
        return response()->json([
            'status' => 'Get Finance Resource',
            'data' => $berita

        ], 200);
    }
    public function automotive() {
        $berita = BeritaMedia::where('category','automotive')->get();
        return response()->json([
            'status' => 'Get Automotive Resource',
            'data' => $berita

        ], 200);
    }
}