<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function bio(Request $request)
    {
     
        $input = $request->input('name');
        $query = "
             SELECT *
             FROM `author`
             WHERE `name` = ?
             
         ";
         $artist = \DB::selectOne($query, [$input]);
         $artist_view = view('artist/bio', [
             'artist' => $artist
         ]);
         $wrapper = view('wrapper', [
             'content' => $artist_view
         ]);
         return $wrapper;
     
    }
}
