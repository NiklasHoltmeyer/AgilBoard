<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcceptanceCriteria;
use Validator;

class AcceptanceCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), AcceptanceCriteria::$rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }


        $acceptanceCriteria = new AcceptanceCriteria;
        forEach(AcceptanceCriteria::getAllFieldNames() as $aPFields){
            if($request->has($aPFields)){
                $acceptanceCriteria[$aPFields] = $request->input($aPFields);
            }
        }

        $acceptanceCriteria->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), AcceptanceCriteria::$rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        
        $id = ($id < 0) ? $request->input('id') : $id;
        $acceptanceCriteria = AcceptanceCriteria::where('id', $id)->first();

        if($acceptanceCriteria){
            forEach(AcceptanceCriteria::getAllFieldNames() as $aPFields){
                if($request->has($aPFields)){
                    $acceptanceCriteria[$aPFields] = $request->input($aPFields);
                }  
            }
            $acceptanceCriteria->save();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acceptanceCriteria = AcceptanceCriteria::where('id',$id)->first();
        $acceptanceCriteria->delete();
        return back();
    }
}
