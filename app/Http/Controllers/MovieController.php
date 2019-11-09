<?php namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class MovieController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view('index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::find($id);

        return view('movie', compact('movie'));
    }

    public function filter(Request $request)
    {
        $movies = Movie::where('name', 'like', "$request->search%")->get();

        return view('index', compact('movies'));
;
    }
}
