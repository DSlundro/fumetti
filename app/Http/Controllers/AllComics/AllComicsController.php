<?php

namespace App\Http\Controllers\AllComics;

use App\Http\Controllers\Controller;
use App\Models\Comic;

class AllComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all()->sortByDesc('id');
        return view('all_comics.index', compact('comics')); 
    }
}
