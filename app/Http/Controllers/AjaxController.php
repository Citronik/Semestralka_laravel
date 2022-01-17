<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AjaxController extends Controller
{
    public function getView($id)
    {
        if(view()->exists('content.' . $id)) {
            return view('content.' . $id)->render();
        }
        abort(404);
    }

}
