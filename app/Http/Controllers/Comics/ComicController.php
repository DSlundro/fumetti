<?php

namespace App\Http\Controllers\Comics;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all()->sortByDesc('id');
        return view('comics.index', compact('comics')); 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $series = Serie::all();
        return view('comics.create', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // asign user_id
        $request['user_id'] = Auth::user()->id;

        // CREATE new image
        Photo::create([
            'link' => $request['link']
        ]);
        
        // asign photo_id
        $request['photo_id'] = Photo::max('id');

        //dd($request);
        // validate form
        $validated = $request->validate([
            'user_id' => 'required',
            'serie_id' => 'required',
            'photo_id' => 'required', 
            'title' => 'required',
            'description' => 'required|max:1000',
        ]);

        // create new comic
        Comic::create($validated);
        return redirect('comics')->with('message', 'New comic successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $comic = Comic::find($id);
        $comments = Comment::all()->where('comic_id', $id)->sortByDesc('created_at');
        return view('comics.show', compact('comic', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        $series = Serie::all();
        return view('comics.edit', compact('comic', 'series'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comic = Comic::find($id);

        // select photo_id of $id
        $photo_id = DB::table('photos')
            ->select('photos.id')
            ->join('comics', 'comics.photo_id', '=', 'photos.id')
            ->where('comics.id', $id)
            ->get();
        $photo = Photo::find($photo_id[0]->id);

        $validated = $request->validate([
            'serie_id' => 'required',
            'title' => 'required',
            'description' => 'required|max:1000',
        ]);

        $photo->update($request->validate(['link'=> 'required']));
        $comic->update($validated);
        return redirect('comics')->with('message', 'Comic successfully modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // select photo_id of $id
        $photo_id = DB::table('photos')
            ->select('photos.id')
            ->join('comics', 'comics.photo_id', '=', 'photos.id')
            ->where('comics.id', $id)
            ->get();

        Photo::destroy($photo_id[0]->id);
        Comic::destroy($id);
        return redirect('comics')->with('message', 'Comic successfully deleted!');
    }
}
