<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $with = ['photo', 'file', 'tags'];

    protected $fillable = [
        'user_id',
        'photo_id',
        'file_id',
        'name',
        'description',
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    public function file()
    {
        return $this->belongsTo('App\Models\File');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'presentation_tags');
    }
}
