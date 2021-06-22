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
        $Hpht = Hpht::all();
        return $this->successResponse(HphtResource::collection($Hpht),'Hpht successfully retrieved');
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
        return $this->successResponse(new HphtResource($Hpht),'Hpht successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Hpht = Hpht::find($id);

        if(is_null($Hpht)){
            return $this->errorResponse('Hpht not found');
        }
       
        return $this->successResponse(new HphtResource($Hpht),'Hpht successfully created');
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

        $Hpht->banyak_lahir = $input['hari_pertama'];
        $Hpht->banyak_lahir = $input['hari_terakhir'];
       $Hpht->save();

    return $this->successResponse(new HphtResource($Hpht),'Hpht successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Hpht->delete();
        return $this->successResponse([],'Hpht successfully delete');
    }
}
