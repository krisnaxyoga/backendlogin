<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataKehamilan;
use App\Http\Resources\DataKehamilanResource;
use Validator;

class DataKehamilanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    dd(DataKehamilan::all());
        $datakehamilan = DataKehamilan::all();

        return $this->successResponse(DataKehamilanResource::collection($datakehamilan),'DataKehamilan successfully retrieved');
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
            'tempatpelayanan' => 'required',
            'tanggal' => 'required',
            'uk' => 'required',
            'beratbadan' => 'required',
            'td' => 'required',
            'lila' => 'required',
            'tinggi_fundus' => 'required',
            'letakjanin' => 'required',
            'tablettambahdarah' => 'required',
            'laboratorium' => 'required',
            'tatalaksana' => 'required',
            'konseling' => 'required',
            
        ]);
        

        if($validator->fails()){
            return $this->errorResponse('validation error', $validator->errors());
        }

        $datakehamilan = DataKehamilan::create($input);

        return $this->successResponse(new DataKehamilanResource($datakehamilan),'DataKehamilan successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datakehamilan = DataKehamilan::find($id);

        if(is_null($datakehamilan)){
            return $this->errorResponse('DataKehamilan not found');
        }
       
        return $this->successResponse(new DataKehamilanResource($datakehamilan),'DataKehamilan successfully created');
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
    public function update(Request $request, DataKehamilan $datakehamilan)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'tempatpelayanan' => 'required',
            'tanggal' => 'required',
            'uk' => 'required',
            'beratbadan' => 'required',
            'td' => 'required',
            'lila' => 'required',
            'tinggi_fundus' => 'required',
            'letakjanin' => 'required',
            'tablettambahdarah' => 'required',
            'laboratorium' => 'required',
            'tatalaksana' => 'required',
            'konseling' => 'required',
        ]);
        

        if($validator->fails()){
            return $this->errorResponse('validation error', $validator->errors());
        }

       $datakehamilan->tempatpelayanan = $input['tempatpelayanan'];
       $datakehamilan->tanggal = $input['tanggal'];
       $datakehamilan->uk = $input['uk'];
       $datakehamilan->beratbadan = $input['beratbadan'];
       $datakehamilan->td = $input['td'];
       $datakehamilan->lila = $input['lila'];
       $datakehamilan->tinggi_fundus = $input['tinggi_fundus'];
       $datakehamilan->letakjanin = $input['letakjanin'];
       $datakehamilan->tablettambahdarah = $input['tablettambahdarah'];
       $datakehamilan->laboratorium = $input['laboratorium'];
       $datakehamilan->tatalaksana = $input['tatalaksana'];
       $datakehamilan->konseling = $input['konseling'];
       $datakehamilan->save();

    return $this->successResponse(new DataKehamilanResource($datakehamilan),'DataKehamilan successfully update');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataKehamilan $datakehamilan)
    {
        $datakehamilan->delete();
        return $this->successResponse([],'DataKehamilan successfully delete');
    }
}
