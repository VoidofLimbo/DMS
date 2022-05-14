<?php

namespace App\Http\Controllers;

use App\Models\Carehome;
use App\Http\Requests\StoreCarehomeRequest;
use App\Http\Requests\UpdateCarehomeRequest;
use App\Models\CarehomeStage;

class CarehomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Carehome::class);

        $carehomes = Carehome::with(['carehomestages', 'stageslogs'])->paginate(5);
        return view('webpages.carehomes.index', compact('carehomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Carehome::class);

        $stages = CarehomeStage::pluck('stage_name', 'id');
        return view('webpages.carehomes.create', compact( 'stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarehomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarehomeRequest $request)
    {

        Carehome::create($request->validated());

        return redirect()->route('carehomes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carehome  $carehome
     * @return \Illuminate\Http\Response
     */
    public function show(Carehome $carehome)
    {
        $this->authorize('view', $carehome);
        $carehome->load('stageslogs');

        return view('webpages.carehomes.show', compact('carehome'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carehome  $carehome
     * @return \Illuminate\Http\Response
     */
    public function edit(Carehome $carehome)
    {
        $this->authorize('update', $carehome);

        $stages = CarehomeStage::pluck('stage_name', 'id');
        $carehome->load('carehomestages');

        return view('webpages.carehomes.edit', compact('carehome', 'stages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarehomeRequest  $request
     * @param  \App\Models\Carehome  $carehome
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarehomeRequest $request, Carehome $carehome)
    {
        $carehome->update($request->validated());
        $carehome->stageslogs->update([$carehome->carehomestages->stage_name => $carehome->updated_at]);
        return redirect()->route('carehomes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carehome  $carehome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carehome $carehome)
    {
        $this->authorize('delete', $carehome);

        $carehome->delete();
        return redirect()->route('carehomes.index');
    }
}
