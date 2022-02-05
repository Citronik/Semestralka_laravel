<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AjaxController extends Controller
{
    /**
     * @param $id
     * @return string|void
     */
    public function getView($id)
    {
        if(view()->exists('content.' . $id)) {
            $photos = Photo::all(['id','filename']);
            return view('content.' . $id, [compact('photos'), ])->render();
        }
        abort(404);
    }

    public function getPresentationButtons($id)
    {
        if(view()->exists('content.buttons')) {
            return view('content.buttons', compact('id'))->render();
        }
        abort(404);
    }

}
