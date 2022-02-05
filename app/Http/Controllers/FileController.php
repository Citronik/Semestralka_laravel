<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\Models\File $file
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        $fileModel = File::findOrFail($file);
        $fileModel->increment('downloadsCount', 1);
        return response()->download(Storage::disk('public')->path('files/' . $fileModel->filename));
    }
}
