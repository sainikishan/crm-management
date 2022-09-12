<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $country=Country::all();
      return view('Countries.index',compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request)
    {
        //
        if($request->hasFile('flag')) 
        {
            $logo = $request->file('flag');
            $destinationPath = 'image/';
            $fileName = $logo->hashName();
            $logo->move($destinationPath, $fileName);
            $request->flag = $fileName;
        }

        Country::create([
            'name'=>$request->name,
            'capital' => $request->capital,
            'currency' => $request->currency,
            'short_code' => $request->shortcode,
            'calling_code' => $request->callingcode,
            'flag' => $request->flag,

        ]);
        return redirect()->back();
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show( $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
        $data=Country::find($country->id);
        return view('Countries.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
        if($request->hasFile('flag')) 
        {
            $logo = $request->file('flag');
            $destinationPath = 'image/';
            $fileName = $logo->hashName();
            $logo->move($destinationPath, $fileName);
            $logoName = $fileName;
        } else {
            $logoName = $country->logo;
        }
        country::where('id',$country->id)->update([
            'name'=>$request->name,
            'capital' => $request->capital,
            'currency' => $request->currency,
            'short_code' => $request->shortcode,
            'calling_code' => $request->callingcode,
            'flag' => $logoName, 
        ]);
        return redirect()->back()->with('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
        $data=country::find($country->id);
        $data->delete();
        return redirect()->back();
    }
}
