<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hpht;
use App\Http\Resources\HphtResource;
use Validator;

class HphtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hpht = Hpht::all();
        return $this->successResponse(HphtResource::collection($hpht),'Hpht successfully retrieved');
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
            'hari_pertama'=> 'required',
        'hari_terakhir'=> 'required',
            
        ]);
        

        if($validator->fails()){
           
            return $this->errorResponse('validation error', $validator->errors());
        }

        $Hpht = Hpht::create($input);
        return $this->successResponse(new HphtResource($hpht),'Hpht successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hpht = Hpht::find($id);

        if(is_null($hpht)){
            return $this->errorResponse('Hpht not found');
        }
       
        return $this->successResponse(new HphtResource($hpht),'Hpht successfully created');
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
            'hari_pertama'=> 'required',
        'hari_terakhir'=> 'required',
        ]);
        

        if($validator->fails()){
            return $this->errorResponse('validation error', $validator->errors());
        }

        $hpht->banyak_lahir = $input['hari_pertama'];
        $hpht->banyak_lahir = $input['hari_terakhir'];
       $hpht->save();

    return $this->successResponse(new HphtResource($hpht),'Hpht successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hpht->delete();
        return $this->successResponse([],'Hpht successfully delete');
    }
}
