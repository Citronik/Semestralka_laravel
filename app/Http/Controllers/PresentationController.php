<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Models\Photo;
use App\Models\Presentation;
use Faker\Core\File;
use Illuminate\Support\Facades\Storage;
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
        return view('presentations.index', [
            'presentations' => $presentations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::all(['id','filename']);
        //$presentations = Presentation::all(['id','name']);
        return view('presentations.create'/*,compact('presentations')*/, compact('photos')

        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresentationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresentationRequest $request)
    {
        $photo = new Photo;
        $file = $request->file('presentation_photo');
        //dd($file);
        $photo->filename = time().$file->getClientOriginalName();
        //$file->storeAs('public/img',$photo->filename);
        //Storage::disk('public')->put('img/' .$photo->filename, $file);
        $file->move(base_path('/public/img'),$photo->filename);
        if ($photo->save()) {
            $presentation = new Presentation;
            $presentation->user_id = $request->user()->id;
            $presentation->photo_id = $photo->id;
            $presentation->name = $request->name;
            $presentation->description = $request->description;
            $presentation->save();
            return redirect()->back()->with('status', 'Presentation was updated.');
        }
        return redirect()->back()->with('status', 'Presentation was not updated.');
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
        if ($request->hasFile('presentation_photo')) {
            $file = $request->file('presentation_photo');
            $photo = $presentation->photo();
            $oldfoto = $photo->get();
            //dd($oldfoto);
            $filename = time().$file->getClientOriginalName();
            $photo->update(['filename' => $filename]);
            $file->move(base_path('/public/img'),$filename);
            Storage::delete('public/img/'.$oldfoto->filename);
        }
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
