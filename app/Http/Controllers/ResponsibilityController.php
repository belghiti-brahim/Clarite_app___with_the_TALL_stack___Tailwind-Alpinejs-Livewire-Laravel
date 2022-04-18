<?php

namespace App\Http\Controllers;

use App\Models\Responsibility;
use Illuminate\Http\Request;

class ResponsibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.responsibilities.responsibilitiesIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.responsibilities.createresponsibility");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsibility  $responsibility
     * @return \Illuminate\Http\Response
     */
    public function show(Responsibility $responsibility)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsibility  $responsibility
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsibility = Responsibility::find($id);
        return view("pages.responsibilities.editresponsibility", compact('responsibility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Responsibility  $responsibility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Responsibility $responsibility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Responsibility  $responsibility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responsibility $responsibility)
    {
        //
    }
}
