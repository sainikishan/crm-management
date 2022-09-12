<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanystoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\URL;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        // $limits = $request->limit ?? 5; 
        Paginator::useBootstrap();
        $companies= Company::paginate(1);
        return view('Company.index',compact('companies'));
       
    }

    public function data(Request $request)
    {
        $limit=$request->page;
       $url="http://127.0.0.1:8000/companies?page=".$limit;
return redirect($url);
   
    }

    // public function autocompleteSearch(Request $request)
    // {
    //       $query = $request->get('query');
    //       $filterResult = Company::where('name', 'LIKE', '%'. $query. '%')->get();
    //       return response()->json($filterResult);
    // } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Company.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanystoreRequest $request)
    {
        if($request->hasFile('logo')) 
        {
            $logo = $request->file('logo');
            $destinationPath = 'image/';
            $fileName = $logo->hashName();
            $logo->move($destinationPath, $fileName);
            $request->logo = $fileName;
        }
        
        Company::create([
            'name'=> $request->name,
            'email' => $request->email,
            'logo' =>   $request->logo,
            'url'   => $request->url,
        ]);

        return redirect()->back()->with('submit', 'Submit Succesfull');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        $data= Company::find($company->id);
       return view('Company.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

        
        if($request->hasFile('logo')) 
        {
            $logo = $request->file('logo');
            $destinationPath = 'image/';
            $fileName = $logo->hashName();
            $logo->move($destinationPath, $fileName);
            $logoName = $fileName;
        } else {
            $logoName = $company->logo;
        }
        Company::where('id', $company->id)->update([
            'name'=> $request->name,
            'email' => $request->email,
            'logo' =>   $logoName,
            'url'   => $request->url,
        ]);
        return redirect()->route('companies.index')->with('Update', 'Update Succesfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $data=Company::find($company->id);
        $data->delete();
        return redirect()->route('companies.index');
    }
}
