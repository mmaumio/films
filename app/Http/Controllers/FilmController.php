<?php

namespace App\Http\Controllers;

use App\Film;
use App\Comment;
use Illuminate\Http\Request;
use \Redirect, \Validator, \Session;
use App\Http\Controllers\Controller;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jsonurl = "http://localhost:8888/film/public/api/films";
        $json = file_get_contents($jsonurl);
        $films = json_decode($json);
        return view('film.index')->with('films', $films);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('film.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'name' => 'required|max:120',
            'description' => 'required|max:120',
            'ticket_price' => 'required|max:120',
            'rating' => 'required|max:120',
            'release_date' => 'required|max:120',
            'country' => 'required|max:120',
            'genre' => 'required|max:120',
        ]);

        $film = new Film;
        $film->name = $request->name;
        $film->slug = strtolower( str_replace( ' ', '-', $request->name ) );
        $film->description = $request->description;
        $film->ticket_price = $request->ticket_price;
        $film->rating = $request->rating;
        $film->release_date = $request->release_date;
        $film->country = $request->country;
        $film->genre = $request->genre;

        $film->save();

        $image = $request->file('photo');
            if( ! empty( $image ) ) {
                $itm_av_name = strtolower( $film->film_name );
                $itm_av_name = str_replace( ' ', '-', $itm_av_name );     
                $avatar_name = $itm_av_name . $film->id . '.' . $request->file('photo')->getClientOriginalExtension();

                $request->file('photo')->move( base_path() . '/public/images/films/', $avatar_name );

                $film_avatar = Film::find($film->id);
                $film_avatar->photo = $avatar_name;
                $film_avatar->save();
            }

        Session::flash('message', 'You have successfully added film');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::where('slug', $id)->first();
        $comments = Comment::where('film_id', $film->id)->get();
        return view('film.show')->with('film', $film)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $films = Film::find($id);
            $films->delete();
            // redirect
            Session::flash('message', 'You have successfully deleted film');
            return Redirect::to('films');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('films');
        }
    }
}
