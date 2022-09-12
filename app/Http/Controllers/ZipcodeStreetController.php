<?php

namespace App\Http\Controllers;

use App\Http\Requests\Zipcode\ZipcodeRequest;
use App\Models\ZipcodeStreet;
use App\Models\CityZipcode;
use Illuminate\Http\Request;

class ZipcodeStreetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $country=ZipcodeStreet::all();
        return view('zipcode.index',compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies=CityZipcode::all();
        return view('zipcode.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZipcodeRequest $request)
    {
        //
        ZipcodeStreet::create([
            'city_zipcode_id'=>$request->city_zipcode_id,
            'street_name' => $request->streetname,
            'street_number'=>$request->streetnumber,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ZipcodeStreet  $zipcodeStreet
     * @return \Illuminate\Http\Response
     */
    public function show(ZipcodeStreet $zipcodeStreet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ZipcodeStreet  $zipcodeStreet
     * @return \Illuminate\Http\Response
     */
    public function edit(ZipcodeStreet $zipcodeStreet)
    {
        //
        // dd($zipcode);
        // $zipcodes =ZipcodeStreet::all();
        // $data=ZipcodeStreet::find($zipcodeStreet->id);
        // dd($data);
        // return view('zipcode.edit',compact('data','zipcodes'));


        $companies=CityZipcode::all();
        $data=zipcodeStreet::find($zipcodeStreet->id);
        return view('zipcode.edit',compact('data','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ZipcodeStreet  $zipcodeStreet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ZipcodeStreet $zipcodeStreet)
    {
        //
        ZipcodeStreet::where('id',$zipcodeStreet->id)->update([
            'city_zipcode_id'=>$request->city_zipcode_id,
            'street_name' => $request->streetname,
            'street_number'=>$request->streetnumber,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ZipcodeStreet  $zipcodeStreet
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZipcodeStreet $zipcodeStreet)
    {
        //
        $data=ZipcodeStreet::find($zipcodeStreet->id);
        $data->delete();
        return redirect()->back();
}
    }

