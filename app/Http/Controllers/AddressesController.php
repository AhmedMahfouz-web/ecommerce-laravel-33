<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;

class AddressesController extends Controller
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
        $address = new Address();
        $address->name = $request->name;
        $address->country = $request->country_name;
        $address->description = $request->description;
        $address->user_id = '1';
        $address->save();

        return redirect()->route('get_checkout');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adress  $adress
     * @return \Illuminate\Http\Response
     */
    public function show(adress $adress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adress  $adress
     * @return \Illuminate\Http\Response
     */
    public function edit(adress $adress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adress  $adress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adress $adress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adress  $adress
     * @return \Illuminate\Http\Response
     */
    public function destroy(adress $adress)
    {
        //
    }
}
