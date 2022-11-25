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
        'title',
        'description',
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

    /* PHOTO */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'comic_id');
    }

    /* COMMENTS */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
