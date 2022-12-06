<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CountryCollection;
use App\Http\Resources\CountyCollection;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index()
    {
        return new CountyCollection(Countries::paginate(10));
    }

    public function show(Countries $country)
    {
        return new CountryResource($country);
    }

    public function store(StoreCountryRequest $request)
    {
        echo $request;
        Countries::create($request->validated());
        return response()->json('Countries Created');
    }
    
    public function update(StoreCountryRequest $request, Countries $country)
    {
        $country-> update($request-> validated());
        return response()-> json('countries upated');
    }
    
    public function destroy(Countries $country)
    {
        $country->delete();
        return response()-> json('country deleted');
    }
}