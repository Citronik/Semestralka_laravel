<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
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
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        return redirect()->back()->with('status', 'Tag was updated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag $tag)
    {
        $tag->update($request->toArray());
        return redirect()->back()->with('status', 'Tag was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if (! is_null($tag->id)) {
            //dd(DB::table("presentation_tags")->where('tag_id' , $tag->id));
            if(DB::table("presentation_tags")->where('tag_id' , $tag->id)->count() >0){
                DB::table("presentation_tags")->where('tag_id' , $tag->id)->delete();
            }
            $tag->delete();
                return redirect()->back()->with('status', 'Tag was deleted.');
        }
        return redirect()->back()->with('status', 'Tag was not deleted.');
    }
}
