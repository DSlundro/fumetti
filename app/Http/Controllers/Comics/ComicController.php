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
use Illuminate\Support\Facades\File;

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
        /* CREATE COMIC */
        // asign user_id
        $request['user_id'] = Auth::user()->id;
        
        // validate form
        $validated = $request->validate([
            'user_id' => 'required',
            'serie_id' => 'required',
            'photos' => 'required',
            'title' => 'required',
            'description' => 'required|max:1000',
        ]);

        // create new comic
        Comic::create($validated);


        /* CREATE PHOTOS */
        $comic_id = $request['post_id'] = Comic::max('id');

        if($request->hasFile('photos')) 
        {
            foreach ($request->file('photos') as $photo) 
            {
                $name = time().rand(1, 100).'.'.$photo->extension();
                $photo->move(('photos'), $name);
                // CREATE new image
                Photo::create([
                    'comic_id' => $comic_id,
                    'link' => $name,
                ]);
            }
        }

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
        // photos validation
        $request->validate([
            'photos' => 'required',
            'photos.*' => 'image|mimes:png,jpg,jpeg,gif,svg'
        ]);

        $comic = Comic::find($id);
        $comic->title = $request->input('title');
        $comic->serie_id = $request->input('serie');
        
        // update the photo
        if($request->hasFile('photos'))
        {
            foreach ($request->file('photos') as $photo) 
            {   
                $name = time().rand(1, 100).'.'.$photo->extension();
                $photo->move(('photos'), $name);
                // replace photo in storage
                foreach($comic->photos as $photo)
                {
                    $oldFile = 'photos/'.$photo->link;
                    if(File::exists($oldFile))
                    {
                        File::delete($oldFile);
                    }
                }
                $photo->link = $name;
                $photo->update();
            }
        }
        $comic->description = $request->input('description');

        // comic validation
        $validated = $request->validate([
            'title' => 'required',
            'serie_id' => 'required',
            'description' => 'required|max:1000',
        ]);

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
        // select all photos of $id
        $photos = DB::table('photos')
            ->select('photos.id', 'link')
            ->join('comics', 'comics.id', '=', 'photos.comic_id')
            ->where('comics.id', $id)
            ->get();

        // delete all photos and storage files
        foreach($photos as $photo)
            {
                $oldFile = 'photos/'.$photo->link;
                if(File::exists($oldFile))
                {
                    File::delete($oldFile);
                }
                Photo::destroy($photo->id);
            }
        Comic::destroy($id);
        return redirect('comics')->with('message', 'Comic successfully deleted!');
    }
}
