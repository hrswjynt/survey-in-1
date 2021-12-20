<?php

namespace App\Http\Controllers;

use App\Models\DataSurvey;
use App\Http\Requests\StoreDataSurveyRequest;
use App\Http\Requests\UpdateDataSurveyRequest;

class DataSurveyController extends Controller
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
     * @param  \App\Http\Requests\StoreDataSurveyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataSurveyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataSurvey  $dataSurvey
     * @return \Illuminate\Http\Response
     */
    public function show(DataSurvey $dataSurvey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataSurvey  $dataSurvey
     * @return \Illuminate\Http\Response
     */
    public function edit(DataSurvey $dataSurvey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataSurveyRequest  $request
     * @param  \App\Models\DataSurvey  $dataSurvey
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataSurveyRequest $request, DataSurvey $dataSurvey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataSurvey  $dataSurvey
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataSurvey $dataSurvey)
    {
        //
    }
}
