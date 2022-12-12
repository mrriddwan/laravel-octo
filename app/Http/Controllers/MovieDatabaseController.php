<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieDirector;
use App\Models\MovieGenre;
use App\Models\MovieGenrePivot;
use App\Models\MovieLanguage;
use App\Models\MoviePerformer;
use App\Models\MoviePerformerPivot;
use App\Models\MovieRating;
use App\Models\ShowTime;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieDatabaseController extends Controller
{
    public function genre()
    {
        $genre = request('genre');

        $movie = Movie::select(
            'movies.id as Movie_ID',
            'movies.movie_title as Title',
            'movie_genres.genre_name as Genre',
            'movie_desc as Description'
        )
            ->join('movie_genre_pivots', 'movies.id', 'movie_genre_pivots.movie_id')
            ->join('movie_genres', 'movie_genre_pivots.genre_id', 'movie_genres.id')
            ->where('movie_genres.genre_name', '=', $genre)
            ->get();

        return response()->json([
            'data' => $movie,
            'status' => true,
            'message' => 'Successfully get movie with required genre',
        ]);
    }

    public function timeslot()
    {
        $theater_name = request('theater_name');
        $time_start = request('time_start');
        $time_end = request('time_end');

        $movie = ShowTime::join('movies', 'show_times.movie_id', '=', 'movies.id')
            ->join('theaters', 'show_times.theater_id', '=', 'theaters.id')
            ->select([
                'show_times.movie_id as Movie_ID',
                'show_times.theater_id as Theater_ID',
                'movies.movie_title as Title',
                'theaters.theater_name',
                'show_times.time_start as Start_time',
                'show_times.time_end as End_time',
                'movies.movie_desc as Description',
                'show_times.theater_room_no as Theater_room_no',
            ])
            ->when($theater_name, function ($query) use ($theater_name) {
                $query->where('theaters.theater_name', $theater_name);
            })
            ->when($time_start && $time_end, function ($query) use ($time_start, $time_end) {
                $query->where('show_times.time_start', '>=', $time_start)
                    ->where('show_times.time_end', '<=', $time_end);;
            })
            ->get()
            ->makeHidden('Theater_ID');

        //test cinema_name = 

        return response()->json([
            'data' => $movie,
            // 'status' => true,
            // 'message' => 'Successfully get movie with specific time window at a specific theater.',
        ]);
    }

    public function specific_movie_theater()
    {
        $theater_name = request('theater_name');
        $d_date = request('d_date');

        $movie = ShowTime::join('movies', 'show_times.movie_id', '=', 'movies.id')
            ->join('theaters', 'show_times.theater_id', '=', 'theaters.id')
            ->select([
                'show_times.movie_id as Movie_ID',
                'show_times.theater_id as Theater_ID',
                'movies.movie_title as Title',
                'theaters.theater_name as Theater name',
                'show_times.time_start as Start_time',
                'show_times.time_end as End_time',
                'movies.movie_desc as Description',
                'show_times.theater_room_no as Theater_room_no',
            ])
            ->when($theater_name, function ($query) use ($theater_name) {
                $query->where('theaters.theater_name', $theater_name);
            })
            ->when($d_date, function ($query) use ($d_date) {
                $query->whereDate('show_times.time_start', $d_date);
            })
            ->get()
            ->makeHidden('Theater_ID');

        return response()->json([
            'data' => $movie,
            // 'status' => true,
            // 'message' => 'Successfully get movie based on specific date at a specific theater.',
        ]);
    }

    public function search_performer()
    {
        $performer_name = request('performer_name');

        $movie = MoviePerformerPivot::select([
            'movie_performer_pivots.movie_id as movie_pivot_id',
            'movie_performer_pivots.performer_id as performer_pivot_id',
            'movies.id as Movie_ID',
            'movies.overall_rating as Overall_Rating',
            'movies.movie_title as Title',
            'movies.movie_desc as Description',
        ])
            ->join('movie_performers', 'movie_performer_pivots.performer_id', 'movie_performers.id')
            ->join('movies', 'movie_performer_pivots.movie_id', 'movies.id')
            ->when($performer_name, function ($query) use ($performer_name) {
                $query->where('movie_performers.performer_name', $performer_name);
            })
            ->get()
            ->makeHidden([
                'movie_pivot_id',
                'performer_pivot_id',
            ]);

        return response()->json([
            'data' => $movie,
            // 'status' => true,
            // 'message' => 'Successfully get movie based on specific performer.',
        ]);
    }

    public function give_rating(Request $request, $username)
    {
        // $request->validate([
        //     'movie_title' => ['text'],
        //     'username' => ['text'],
        //     'rating' => ['text'],
        //     'r_description' => ['text']
        // ]);

        $movie_id = Movie::where('movie_title', '=', $request->movie_title)->value('id');
        $user_id = User::where('name', '=', $username)->value('id');

        MovieRating::create([
            'movie_id' => $movie_id,
            'user_id' => $user_id,
            'rating' => $request->rating,
            'rating_description' => $request->r_description,
        ]);

        return response()->json([
            "message" => "Successfully added review for " . $request->movie_title . "by user: " . $request->username, "success" => true,
        ]);
    }

    public function new_movies()
    {
        $r_date = request('r_date');

        $movie = Movie::select([
            'movies.id as Movie_ID',
            'movies.overall_rating as Overall_Rating',
            'movies.movie_title as Title',
            'movies.movie_desc as Description',
            'movies.movie_release_date as Movie_Date',
        ])
            ->when($r_date, function ($query) use ($r_date) {
                $query->whereDate('movies.movie_release_date', '=', $r_date);
            })
            ->get()
            ->makeHidden('Movie_Date');

        return response()->json([
            "data" => $movie,
        ]);
    }

    public function add_movie(Request $request)
    {
        // $request->validate([
        //     'title' => ['required', 'string'],
        //     'release' => ['required', 'string'],
        //     'length' => ['required', 'string'],
        //     'description' => ['required', 'string'],
        //     'mpaa_rating' => ['required', 'string'],
        //     'director' => ['required', 'string'],
        //     'language' => ['required', 'string'],
        //     'genre' => ['required', 'string'],
        //     'performer' => ['required', 'string'],
        // ]);

        // $movie = Movie::create([
        //     'movie_title' => $request->title,
        //     'movie_release_date' => Carbon::parse($request->release)->toDate(),
        //     'movie_length' => $request->length,
        //     'movie_desc' => $request->description,
        //     'mpaa_rating' => $request->mpaa_rating,
        // ]);

        // function genre($var)
        // {
        //     // returns whether the input integer is odd
        //     return $var ;
        // }

        // print_r(array_filter($request->all(), "odd"));

        $genres = [];

        if($request['genre']){
            array_push($genres,$request->genre);
        }
        dd($genres);

        // foreach($genres as $genre ){
        //     MovieGenrePivot::create([
        //                 'movie_id' => $movie->id,
        //                 'genre_id' => MovieGenre::where('movie_genres.genre_name', '=', $genre)->value('id')
        //             ]);
        // }
        // $movie->genre()->sync(MovieGenre::where('movie_genres.genre_name', '=', $request['genre'])->value('id'));
        // $movie->genre()->sync([1,2,3]);
        // Movie::where('id', $movie->id)->performer()->sync(MoviePerformer::where('movie_performers.performer_name', '=', $request['performer'])->value('id'));
        // Movie::where('id', $movie->id)->language()->sync(MovieLanguage::where('movie_languages.language_name', '=', $request['language'])->value('id'));
        // Movie::where('id', $movie->id)->director()->sync(MovieDirector::where('movie_directors.director_name', '=', $request['director'])->value('id'));

        // return response()->json([
        //     // "message" => "Successfully added movie " . $request->title . " with Movie_ID " . $movie->id, "success" => true,
        //     "message" => "Successfully added movie " . $request->title . " with Movie_ID " . 100, "success" => true,
        // ]);
    }
}


        // $request->collect('genre')->each(function ($genre) {
        //     MovieGenrePivot::create([
        //         // 'movie_id' => $movie->id,
        //         'movie_id' => 100,
        //         'genre_id' => MovieGenre::where('movie_genres.genre_name', '=', $genre)->value('id')
        //     ]);
        // });

        // $genres = $request->get('genre');

        // dd($genres);

        // foreach ($genres as $genre) {
        //     MovieGenrePivot::create([
        //         'movie_id' => $movie->id,
        //         'genre_id' => MovieGenre::where('movie_genres.genre_name', '=', $genre)->value('id')
        //     ]);
        // }
        // if ($request->genre) {
        //     MovieGenrePivot::create([
        //         'movie_id' => $movie->id,
        //         'genre_id' => MovieGenre::where('movie_genres.genre_name', '=', $request->genre)->value('id')
        //     ]);
        // }

        // $performers = $request->get('performer');

        // foreach ($performers as $performer) {
        //     MovieGenrePivot::create([
        //         'movie_id' => $movie->id,
        //         'performer_id' => MoviePerformer::where('movie_performers.performer_name', '=', $performer)->value('id')
        //     ]);
        // }
        // dd($request->genre);
