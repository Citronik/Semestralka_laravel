<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Models\File;
use App\Models\Photo;
use App\Models\Presentation;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

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
        $tags = Tag::all(['id', 'name']);
        return view('presentations.create', compact('tags'));
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
        $photoFile = $request->file('presentation_photo');
        $photo->filename = time().$photoFile->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'images', $photoFile, $photo->filename
        );

        if ($request->hasFile('presentation_file')) {
            $presentationFile = $request->file('presentation_file');
            $file = new File();
            $file->filename = time().$presentationFile->getClientOriginalName();
            $file->downloadsCount = 0;
            Storage::disk('public')->putFileAs(
                'files', $presentationFile, $file->filename
            );
            $file->save();
        }

        if ($photo->save()) {
            $presentation = new Presentation;
            $presentation->user_id = $request->user()->id;
            $presentation->photo_id = $photo->id;
            $presentation->name = $request->name;
            $presentation->description = $request->description;
            $presentation->tags()->sync($request->tags);
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
        $tags = Tag::all(['id', 'name']);
        return view('presentations.update', [
            'presentation' => $presentation,
        'tags' => $tags
        ]);
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
        $presentation->tags()->sync($request->tags);

        if ($request->hasFile('presentation_file')) {
            $presentationFile = $request->file('presentation_file');

            if($presentation->file) {
                $file = $presentation->file;
                Storage::disk('public')->delete('images/'.$file->filename);
            } else {
                $file = new File();
            }

            $file->filename = time().$presentationFile->getClientOriginalName();
            $file->downloadsCount = 0;
            Storage::disk('public')->putFileAs(
                'files', $presentationFile, $file->filename
            );
            $file->save();
            $presentation->file_id = $file->id;
        }

        if ($request->hasFile('presentation_photo')) {
            $photoFile = $request->file('presentation_photo');
            $photo = $presentation->photo;
            $oldPhotoFilename = $photo->filename;
            $filename = time().$photoFile->getClientOriginalName();
            $photo->update(['filename' => $filename]);
            Storage::disk('public')->putFileAs(
                'images', $photoFile, $filename
            );
            Storage::disk('public')->delete('images/'.$oldPhotoFilename);
        }
        $presentation->save();
        return redirect()->back()->with('status', 'Presentation was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function destroy($presentation)
    {
        $presentationModel = Presentation::findOrFail($presentation);

        $photo = $presentationModel->photo;
        $filename = $photo->filename;
        Storage::disk('public')->delete('images/'.$filename);
        $photo->delete();
        $presentationModel->delete();
        $presentation->tags;

        return redirect()->back()->with('status', 'Presentation was deleted.');
    }

}
