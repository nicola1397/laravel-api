<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Requests\EditTechnologyRequest;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::paginate();

        return view('admin.technologies.index', compact('technologies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = new Technology;

        return view('admin.technologies.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateTechnologyRequest $request)
    {
        $request->validated();


        $data = $request->all();

        $new_technology = new Technology;

        $new_technology->fill($data);

        $new_technology->save();

        return redirect()->route('admin.technologies.show', $new_technology)->with('message', 'Tipo creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $request->validated();

        $data = $request->all();

        $technology->update($data);

        return redirect()->route('admin.technologies.show', compact('technology'))->with('message', 'Tipo modificato con successo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('message', 'Tipo eliminato con successo');

    }
}
