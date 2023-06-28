<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    
    public function index()
    {
        $songs = Song::select('*')->get();

        //dd - dump
        // dump($songs);
        return view('song.index',compact('songs'));
    }

 
    public function create()
    {
        return view('song.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'artista' => 'required',
        ]);
        
        $song = new Song();
        //Base de datos = del form
        $song->nombre = $request->nombre;
        $song->artista = $request->artista;

        $song->save();

        return Redirect()->route('song.index');
    }


    public function show(string $id)
    {
        //
    }

  
    public function edit($song)
    {
        $song = Song::find($song);
        // dump($song);
        return view('song.edit', compact('song'));
    }

   
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'nombre' => 'required',
            'artista' => 'required',
        ]);
        
        // $song = new Song();
        //Base de datos = del form
        $song->nombre = $request->nombre;
        $song->artista = $request->artista;

        $song->save();

        return Redirect()->route('song.index');
    }

   
    public function destroy(Song $song)
    {
        $song->delete();
        
        return Redirect()->route('song.index');

    }
}
