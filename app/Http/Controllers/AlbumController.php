<?php

namespace App\Http\Controllers;

use View;
use App\Band;
use App\Album;
use Illuminate\Http\Request;
use Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bands = Band::pluck('name','id');
        return view("album.create")->withBands($bands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'band_id' => 'required',
            'name' => 'required'
        ]);
        $input = $request->all();

        Album::create($input);

        Session::flash('flash_message', 'Album successfully added!');

        return redirect()->route('albums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bands = Band::pluck('name','id');
        $album = Album::findOrFail($id);

        return View::make('album.edit', compact('bands','album'));
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
        $album = Album::findOrFail($id);

        $this->validate($request, [
            'band_id' => 'required',
            'name' => 'required'
        ]);

        $input = $request->all();

        $album->fill($input)->save();

        Session::flash('flash_message', 'Album successfully updated!');

        return redirect()->route('albums');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);

        $album->delete();

        Session::flash('flash_message', 'Album successfully deleted!');

        return redirect()->route('albums');
    }
}
