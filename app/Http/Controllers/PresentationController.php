<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Models\Presentation;
use Illuminate\View\View;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = Presentation::all()->load('photo');
        return view('presentations.index', ['presentations' => $presentations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presentations = Presentation::all(['id','name']);
        return view('presentations.create',compact('presentations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresentationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresentationRequest $request)
    {

        $presentation = new Presentation;
        $presentation->user_id = $request->user()->id;
        $presentation->photo_id = $request->get('photo');
        $presentation->name = $request->name;
        $presentation->description = $request->description;
        $presentation->save();
        return redirect()->back()->with('status', 'Presentation was updated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentation)
    {
       return view('presentations.show', ['presentation' => $presentation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentation $presentation)
    {
        return view('presentations.update', [
            'presentation' => $presentation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresentationRequest  $request
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresentationRequest $request, Presentation $presentation)
    {
        $presentation->update($request->toArray());
        return redirect()->back()->with('status', 'Presentation was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentation $presentation)
    {
        $presentation->delete();
        return redirect()->back()->with('status', 'Presentation was deleted.');
    }

}
