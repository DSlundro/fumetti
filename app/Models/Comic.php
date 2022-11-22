<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'serie',
        'description',
        'cover',
    ];


    public function user() 
    {
        return $this->belongsTo(User::class);
    }

/* // Asign Auth user_id on creating 
    public function save(array $options = array())
    {
        $this->user_id = auth()->id();
        parent::save($options);
    } */
}
