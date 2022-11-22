<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comic_id',
    ];

    public function comics()
    {
        return $this->hasMany(Comic::class);
    }
}
