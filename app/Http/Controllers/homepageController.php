<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie_info;
use App\Models\memeinfo;

class homepageController extends Controller
{
    function index(){

        $users = movie_info::all();

        $slidermovies=[];
        $cnt=0;

        foreach ($users as $i){

            $slidermovies[]=$i;
            $cnt++;
            if($cnt>=4){
                break;
            }

        }

        return view('index', [
            'users' => $users,
            'slider' => $slidermovies,
            
        ]);
    }


    public function play(Request $request)
    {
        $video = $request->input('video');
        return view('streaming', ['video' => $video]);

    }
}
