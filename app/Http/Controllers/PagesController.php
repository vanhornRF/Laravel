<?php

namespace App\Http\Controllers;

use View;
use App\Band;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
	{
	    $bands = Band::all();
		return view("band.index")->withBands($bands);
	}

	public function albums()
	{
		$bandsList = Band::pluck('name','id');
		$bandsList->prepend('Select Band');
        $bands = Band::with("albums")->get();
        return View::make('album.index', compact('bands','bandsList'));
	}
}
