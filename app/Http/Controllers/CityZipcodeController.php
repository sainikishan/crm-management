<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cityzipcode\CityzipcodeRequest;
use App\Models\CityZipcode;
use App\Models\CountryCity;
use Illuminate\Http\Request;

class CityZipcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zipcodes = CityZipcode::latest()->get();
        return view('Cityzipcode.index',compact('zipcodes'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $compaines=CountryCity::all();
        return view('Cityzipcode.create',compact('compaines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityzipcodeRequest $request)
    {
        //
        // dd($request->all());

        CityZipcode::create([
            'zipcode'=> $request->zipcode,
            'country_city_id' => $request->country_city_id,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City_zipcode  $city_zipcode
     * @return \Illuminate\Http\Response
     */
    public function show(CityZipcode $city_zipcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CityZipcode  $city_zipcode
     * @return \Illuminate\Http\Response
     */
    public function edit(CityZipcode $zipcode)
    {
        // dd($zipcode);
        $zipcodes =CountryCity::all();
        $data=CityZipcode::find($zipcode->id);
        // dd($data);
        return view('Cityzipcode.edit',compact('data','zipcodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cityzipcode  $city_zipcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityZipcode $zipcode)
    {
        //
        // dd($zipcode);
        CityZipcode::where('id',$zipcode->id)->update([
            'zipcode'=> $request->zipcode,
            'country_city_id' => $request->country_city_id,
        ]);
        return redirect()->back();

        
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City_zipcode  $city_zipcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(CityZipcode $zipcode)
    {
        //
        $data=CityZipcode::find($zipcode->id);
        $data->delete();
        return redirect()->back();
}
}