<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use App\Http\Resources\MovieResource;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(5);
        
        return MovieResource::collection($movies);
    }

    public function byGenre($genre_slug)
    {
        $genre = Genre::where('slug', $genre_slug)->first();
        $movies = $genre->movies()->orderBy('updated_at', 'desc')->paginate(2);
       
        return view('genre.index', compact('movies', 'genres'));
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $latest = Movie::orderBy('updated_at', 'desc')->limit(5)->get();
       

        return new MovieResource($movie);
    }
}
