<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'link',
        'comic_id'
    ];


    public function comic()
    {
        return $this->belongsTo(Comic::class, 'comic_id');
    }
}
