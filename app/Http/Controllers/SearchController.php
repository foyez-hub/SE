<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie_info;

class SearchController extends Controller
{

    public function search(Request $req)
    {
        $searchbox = $req->input('searchbox');
        $movies = movie_info::where('movie_name', 'LIKE', '%' . $searchbox . '%')->get();

        return view('search', ['movies' => $movies]);
    }

    public function realsearch(Request $req)
    {
        return "hello";
    }

    public function searchResults(Request $request)
    {
        $query = $request->input('q');
        $movies = movie_info::where('movie_name', 'LIKE', '%' . $query . '%')->get();
        $resultsHtml = '';
        foreach ($movies as $movie) {
            $resultsHtml .= '<div class="search-result">' . $movie->movie_name . '</div>';
        }
        return $resultsHtml;
    }

    public function searchbar(Request $request)
    {
        $searchbar = $request->input('searchbar');

        return response()->json(['status' => 'ok']);
    }
}
