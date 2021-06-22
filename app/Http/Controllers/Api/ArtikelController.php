<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Http\Resources\ArtikelResource;
use Validator;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        return $this->successResponse(ArtikelResource::collection($artikel),'Artikel successfully retrieved');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'judul' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required',
            'tanggal' => 'required',
            'slug' => 'required',
        ]);
        

        if($validator->fails()){
           
            return $this->errorResponse('validation error', $validator->errors());
        }

        $artikel = Artikel::create($input);
        return $this->successResponse(new ArtikelResource($artikel),'Artikel successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::find($id);

        if(is_null($artikel)){
            return $this->errorResponse('Artikel not found');
        }
       
        return $this->successResponse(new ArtikelResource($artikel),'Artikel successfully created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'judul' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required',
            'tanggal' => 'required',
            'slug' => 'required',
        ]);
        

        if($validator->fails()){
            return $this->errorResponse('validation error', $validator->errors());
        }

       $artikel->judul = $input['judul'];
       $artikel->konten = $input['konten'];
       $artikel->kategori_id = $input['kategori_id'];
       $artikel->tanggal = $input['tanggal'];
       $artikel->slug = $input['slug'];
       $artikel->save();

    return $this->successResponse(new ArtikelResource($artikel),'Artikel successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel->delete();
        return $this->successResponse([],'artikel successfully delete');
    }
}
