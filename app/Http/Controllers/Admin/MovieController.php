<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use App\Http\Requests\CreateMovieRequest;
use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Intervention\Image\Facades\Image;
use File;

class MovieController extends Controller
{
    public function index()
    {
        //
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::pluck('genre_type', 'id')->all();
        return view('admin.movies.create', compact( 'genres'));
    }

    public function store(CreateMovieRequest $request)
    {
        //
        $input = $request->all();

        $movie = Movie::create($input);
        $movie->genres()->sync($request->get('genres'));

        return redirect('admin/movies/'. $movie->id .'/edit');
    }

    public function edit($id)
    {
        $genres = Genre::pluck('genre_type', 'id')->all();
        $movies = Movie::findOrFail($id);

        return view('admin.movies.edit', compact('movies',
             'genres'));
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

        $input = $request->all();

        $movie = Movie::whereId($id)->first();
        $movie->update($input);
        $movie->genres()->sync($request->get('genres'));
        return redirect('/admin/movies');
    }


    public function destroy($id)
    {
        //
        $movie = Movie::findOrFail($id);
        $photos = $movie->photos()->get();
        foreach ($photos as $photo) {
            File::delete(storage_path('app/public'). $photo->threezerozero);
            File::delete(storage_path('app/public'). $photo->fivefivezero);
            File::delete(storage_path('app/public'). $photo->thumbnail);
        }

        $movie->photos()->delete();
        $movie->delete();
//        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/movies');
    }

    public function addEmbed($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $embeds = $movie->embeds();

        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);

        return back();
    }

    public function addShikolinks($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $embeds = $movie->shikolinks();

        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);

        return back();
    }

    public function addShkarkolinks($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $embeds = $movie->shkarkolinks();

        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);

        return back();
    }

    public function addTrailerlinks($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $embeds = $movie->trailerlinks();

        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);

        return back();
    }

    public function addPhoto($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $photos = $movie->photos();


        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();
        if (!file_exists(storage_path('app/public/moviePhoto'))){
            mkdir(storage_path('app/public/moviePhoto', 0777, true));
        }

        if (!file_exists(storage_path('app/public/moviePhoto/img300'))){
            mkdir(storage_path('app/public/moviePhoto/img300', 0777, true));
        }

        if (!file_exists(storage_path('app/public/moviePhoto/img550'))){
            mkdir(storage_path('app/public/moviePhoto/img550', 0777, true));
        }
        $path = '/moviePhoto';
        $file->move(storage_path('app/public').$path, $name);
        $threzerozero = Image::make(storage_path('app/public')
            .$path . '/'.$name)->fit(214, 317)->save(storage_path('app/public')
            .$path.'/img300/'.$name);
        $fivefivezero = Image::make(storage_path('app/public')
            .$path . '/'.$name)->fit(550, 425)->save(storage_path('app/public')
            .$path.'/img550/'.$name);

        $photos->create([
            'threezerozero' => "$path/img300/{$name}",
            'fivefivezero' => "$path/img550/{$name}",
            'thumbnail' => "$path/{$name}",
        ]);


    }
}
