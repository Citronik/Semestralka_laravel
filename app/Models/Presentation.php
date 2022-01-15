<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'photo_id',
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
}
