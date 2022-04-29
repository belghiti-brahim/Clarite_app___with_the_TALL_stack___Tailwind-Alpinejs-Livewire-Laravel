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
        return view('pages.responsibilities.responsibilities_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.responsibilities.create_responsibility");
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
    public function show($id)
    {

        $res ="to test for and show responsibility projects";
        $responsibility = Responsibility::find($id);
        return view("pages.responsibilities.show_responsibility", compact("responsibility", "res"));
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
        return view("pages.responsibilities.edit_responsibility", compact('responsibility'));
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
    public function destroy($id)
    {
        $responsibility = Responsibility::find($id);
        $responsibility->delete();
        return response()->json(['success' => "la responsibilité a été suprimée avec succèss"]);
    }
}
