<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AjaxController extends Controller
{
    public function getView($id)
    {
        if(view()->exists('content.' . $id)) {
            $photos = Photo::all(['id','filename']);
            return view('content.' . $id, compact('photos'))->render();
        }
        abort(404);
    }

}
