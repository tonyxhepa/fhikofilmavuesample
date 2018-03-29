<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }

//    public function create()
//    {
//        //
//        return view('admin.genres.create', compact('languages'));
//    }

    public function store(Request $request)
    {
        $genre = new Genre;

        $genre->genre_type = $request->genre_type;
        $genre->genre_description = $request->genre_description;

        $genre->save();

        return back();
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);

        $genre->delete();

        return redirect('admin/genres')->with('deleted_post', 'U fshije rregullisht');
    }
}
