<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'comic_id'
    ];

    /* USER */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* COMIC */
    public function comic()
    {
        return $this->belongsTo(Comic::class, 'id', 'comic_id');
    }
}
