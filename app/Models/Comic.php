<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'serie_id',
        'photo_id',
        'title',
        'description',
        'cover',
    ];

    /* USER */
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    /* SERIE */
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    /* PHOTOS */
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

}
