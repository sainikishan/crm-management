<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\CountryStoreRequest;
use App\Http\Requests\Countrycity\CountrycityRequest;
use App\Models\CountryCity;
use App\Models\Country;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class CountryCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countryes=countrycity::all();
        return view('country_cities.index',compact('countryes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies=Country::all();
        return view('country_cities.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountrycityRequest $request)
    {
        //
        CountryCity::create([
            'name'=> $request-> name,
            'country_id' => $request->Country_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryCity  $countryCity
     * @return \Illuminate\Http\Response
     */
    public function show(CountryCity $countryCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CountryCity  $countryCity
     * @return \Illuminate\Http\Response
     */
    public function edit(CountryCity $countryCity)
    {
        //
        $companies=Country::all();
        $data=Countrycity::find($countryCity->id);
        return view('country_cities.edit',compact('data','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CountryCity  $countryCity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CountryCity $countryCity)
    {
        //
        CountryCity::where('id',$countryCity->id)->update([
            'name'=>$request->name,
            'country_id'=>$request->country_id,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryCity  $countryCity
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryCity $countryCity)
    {
        //
        $data=countrycity::find($countryCity->id);
        $data->delete();
        return redirect()->back();
    }
}
