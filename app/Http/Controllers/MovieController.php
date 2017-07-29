<?php

namespace Movie\Http\Controllers;

use Movie\Movie;
use Movie\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::Movies();
        return view('pelicula.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::pluck('genre', 'id');
        return view('pelicula.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movie::create($request->all());
        Session::flash('message', 'PElicula creada');
        return redirect('/pelicula');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Movie\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Movie\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $genres = Genre::pluck('genre', 'id');
        return view('pelicula.edit', ['movie'=>$movie, 'genres'=>$genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Movie\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if ($request->hasFile('path')) {
            \Storage::delete($movie->path);
        }

        $movie->fill($request->all());
        $movie->save();
        Session::flash('message', 'PElicula actualizada');
        return redirect('/pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Movie\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        \Storage::delete($movie->path);
        Session::flash('message', 'PElicula eliminada');
        return redirect('/pelicula');
    }
}
