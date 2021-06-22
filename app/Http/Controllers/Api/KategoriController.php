<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriArtikel;
use App\Http\Resources\KategoriResource;
use Validator;

class KategoriController extends Controller
{  
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $kategori = Kategori::all();
       return $this->successResponse(KategoriResource::collection($kategori),'Kategori successfully retrieved');
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
           'kategori'=> 'required',
           
       ]);
       

       if($validator->fails()){
          
           return $this->errorResponse('validation error', $validator->errors());
       }

       $kategori = Kategori::create($input);
       return $this->successResponse(new KategoriResource($kategori),'Kategori successfully created');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $Kategori = Kategori::find($id);

       if(is_null($Kategori)){
           return $this->errorResponse('Kategori not found');
       }
      
       return $this->successResponse(new KategoriResource($Kategori),'Kategori successfully created');
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
           'kategori'=> 'required',
       
       ]);
       

       if($validator->fails()){
           return $this->errorResponse('validation error', $validator->errors());
       }

       $Kategori->kategori = $input['kategori'];
      $Kategori->save();

   return $this->successResponse(new KategoriResource($Kategori),'Kategori successfully update');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $Kategori->delete();
       return $this->successResponse([],'Kategori successfully delete');
   }
}
