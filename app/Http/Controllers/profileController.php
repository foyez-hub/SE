<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    function isfriend($email1, $email2)
    {

        $info1 = DB::table('users')
            ->where('email', $email1)
            ->select('*')
            ->first();

        $info1 = $info1->friendlist;
        $info1 = explode(",", $info1);
        $flag = 0;

        foreach ($info1 as $i) {
            if ($i == $email2) {
                $flag = 1;
                break;
            }
        }

        if ($flag == 1) {
            return true;
        } else {

            return false;
        }
    }

    function isthere($s1, $key)
    {

        $s1 = explode(",", $s1);
        $flag = 0;

        foreach ($s1 as $i) {
            if ($i == $key) {
                $flag = 1;
                break;
            }
        }

        if ($flag == 1) {
            return true;
        } else {

            return false;
        }
    }


    function allData()
    {

        $email = session('email');

        $allUserInfo = DB::table('users')
            ->where('email', $email)
            ->select('*')
            ->first();


        $watchlist = $allUserInfo->watchlist;
        $watchlists = explode(",", $watchlist);
        $watchlistMap = [];

        $favorites = $allUserInfo->favorites;
        $favorites = explode(",", $favorites);
        $favoritesMap = [];

        $recent = $allUserInfo->recent;
        $recent = explode(",", $recent);
        $recentMap = [];

        $allMovieInfo = DB::table('movie_infos')->get();


        foreach ($allMovieInfo as $i) {

            foreach ($watchlists as $j) {

                if ($i->movie_name == $j) {
                    $watchlistMap[$i->movie_name] = $i;
                }
            }
            foreach ($favorites as $j) {

                if ($i->movie_name == $j) {
                    $favoritesMap[$i->movie_name] = $i;
                }
            }

            foreach ($recent as $j) {

                if ($i->movie_name == $j) {
                    $recentMap[$i->movie_name] = $i;
                }
            }
        }







        return [$allUserInfo, $watchlistMap, $recentMap, $favoritesMap];
    }

    function setPrivacy(Request $request)
    {

        $email = session('email');

        $colName = $request->input('colName');
        $privacytype = $request->input('privacytype');


        DB::table('users')
            ->where('email', $email)
            ->update([$colName => $privacytype]);

        return response()->json("OK");
    }

    function remove(Request $request)
    {

        $email = session('email');

        $movieName = $request->input('movieName');
        $colname = $request->input('colname');


        $row = DB::table('users')
            ->where('email', $email)
            ->select('*')
            ->first();


        $info = $row->$colname;
        $info = explode(",", $info);
        $names = '';

        foreach ($info as $i) {
            if ($i != $movieName) {
                $names .= $i . ',';
            }
        }

        DB::table('users')
            ->where('email', $email)
            ->update([$colname => $names]);


        return response()->json("OK");
    }

    function profilEdit()
    {

        $email = session('email');
        $row = DB::table('users')
            ->where('email', $email)
            ->select('*')
            ->first();

        $data = [];
        $data['name'] = $row->name;
        $data['image'] = $row->image;
        $data['bio'] = $row->bio;




        return response()->json($data);
    }

    function editprofile(Request $request)
    {

        $name = $request->input('name');
        $img = $request->input('img');
        $bio = $request->input('bio');
        if ($img == "") $img = "profile.jpg";

        $email = session('email');
        $img = str_replace('C:\\fakepath\\', '', $img);
        DB::table('users')
            ->where('email', $email)
            ->update([
                'name' => $name,
                'image' => $img
            ]);

        DB::table('users')
            ->where('email', $email)
            ->update([
                'bio' => $bio
            ]);
    }

    function viewprofile(Request $request)
    {

        $rcvemail = $request->input('email');

        $row = DB::table('users')
            ->where('email', $rcvemail)
            ->select('*')
            ->first();
        session(['viewProfileEmail' => $rcvemail]);

        return response()->json("okkk");
    }

    function  viewprofileAllData()
    {

        $email = session('viewProfileEmail');

        $allUserInfo = DB::table('users')
            ->where('email', $email)
            ->select('*')
            ->first();


        $watchlist = $allUserInfo->watchlist;
        $watchlists = explode(",", $watchlist);
        $watchlistMap = [];

        $favorites = $allUserInfo->favorites;
        $favorites = explode(",", $favorites);
        $favoritesMap = [];

        $recent = $allUserInfo->recent;
        $recent = explode(",", $recent);
        $recentMap = [];

        $allMovieInfo = DB::table('movie_infos')->get();


        foreach ($allMovieInfo as $i) {

            foreach ($watchlists as $j) {

                if ($i->movie_name == $j) {
                    $watchlistMap[$i->movie_name] = $i;
                }
            }
            foreach ($favorites as $j) {

                if ($i->movie_name == $j) {
                    $favoritesMap[$i->movie_name] = $i;
                }
            }

            foreach ($recent as $j) {

                if ($i->movie_name == $j) {
                    $recentMap[$i->movie_name] = $i;
                }
            }
        }







        return [$allUserInfo, $watchlistMap, $recentMap, $favoritesMap];
    }

    function addFriend()
    {
        $sendfriendemail = session('viewProfileEmail');
        $myemail = session('email');




        $myinfo = DB::table('users')
            ->where('email', $myemail)
            ->select('*')
            ->first();


        $myinfo = $myinfo->sentreq;

        if($this->isthere($myinfo,$sendfriendemail)==false){

        $myinfo .= $sendfriendemail . ',';

        DB::table('users')
            ->where('email', $myemail)
            ->update([
                'sentreq' => $myinfo
            ]);

        }


        $sendfriendeinfo = DB::table('users')
            ->where('email', $sendfriendemail)
            ->select('*')
            ->first();


        $sendfriendeinfo = $sendfriendeinfo->friendreq;
        if($this->isthere($sendfriendeinfo,$myemail)==false){

        $sendfriendeinfo .= $myemail . ',';

        DB::table('users')
            ->where('email', $sendfriendemail)
            ->update([
                'friendreq' => $myemail
            ]);

        }

        return response()->json("ok add friend");
    }

    function nameShow(){

        $email = session('email');
        $row = DB::table('users')
            ->where('email', $email)
            ->select('*')
            ->first();

            return response()->json($row->name);
 


    }


}
