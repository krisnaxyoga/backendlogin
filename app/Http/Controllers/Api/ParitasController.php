<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paritas;
use App\Http\Resources\ParitasResource;
use Validator;

class ParitasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Paritas = Paritas::all();
        return $this->successResponse(ParitasResource::collection($Paritas),'Paritas successfully retrieved');
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
            
            'banyak_lahir'=> 'required',
            'banyak_hidup'=> 'required',
            'banyak_meninggal'=> 'required',
        ]);
        

        if($validator->fails()){
           
            return $this->errorResponse('validation error', $validator->errors());
        }

        $Paritas = Paritas::create($input);
        return $this->successResponse(new ParitasResource($Paritas),'Paritas successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Paritas = Paritas::find($id);

        if(is_null($Paritas)){
            return $this->errorResponse('Paritas not found');
        }
       
        return $this->successResponse(new ParitasResource($Paritas),'Paritas successfully created');
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
            'banyak_lahir'=> 'required',
            'banyak_hidup'=> 'required',
            'banyak_meninggal'=> 'required',
        ]);
        

        if($validator->fails()){
            return $this->errorResponse('validation error', $validator->errors());
        }

       $Paritas->banyak_lahir = $input['banyak_lahir'];
       $Paritas->banyak_hidup = $input['banyak_hidup'];
       $Paritas->banyak_meninggal = $input['banyak_meninggal'];
       $Paritas->save();

    return $this->successResponse(new ParitasResource($Paritas),'Paritas successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Paritas->delete();
        return $this->successResponse([],'Paritas successfully delete');
    }
}
