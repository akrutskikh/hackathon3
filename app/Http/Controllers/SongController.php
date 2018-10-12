<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
       //
       public function jukebox()
       {
        
            $query = "
                SELECT *
                FROM `songs`
                WHERE 1
                ORDER BY `id` DESC
            ";
            $songs = \DB::select($query);
            $list_view = view('jukebox', [
                'songs' => $songs
            ]);
            $wrapper = view('wrapper', [
                'content' => $list_view
            ]);
            return $wrapper;
        
       }
       public function listing()
       {
        
            $query = "
                SELECT *
                FROM `songs`
                WHERE 1
                ORDER BY `id` DESC
            ";
            $songs = \DB::select($query);
            $list_view = view('list', [
                'songs' => $songs
            ]);
            $wrapper = view('wrapper', [
                'content' => $list_view
            ]);
            return $wrapper;
        
       }
       public function create()
       {
           
           $song = [
               'id' => null,
               'name' => null,
               'author' => null,
               'date' => null,
               'url' => null
           ];
         
           $form = view('edit', [
               'song' => $song
           ]);
           return view('wrapper', [
               'content' => $form
           ]);
       }

       public function edit(Request $request)
       {
           
           $song = $this->getSongById($request->input('id'));
          
           $form = view('edit', [
               'song' => $song
           ]);
           return view('wrapper', [
               'content' => $form
           ]);
       }

       public function delete(Request $request)
       {
           if ($request->input('id')) {
               
               $id = $request->input('id');
               $query = "
                   DELETE FROM `songs`
                   WHERE `id` = ?
               ";

               
               \DB::delete($query, [$id]);
               return redirect('/');

           } else {
            return redirect('/');
            }
        }
           
           
            

       public function store(Request $request)
       {
           if ($request->input('id')) {
               
               $song = $this->getSongById($request->input('id'));
           
           } else {
               
               $song = [
                'id' => null,
                'name' => null,
                'author' => null,
                'date' => date("Y/m/d"),
                'url' => null
            ];
           }
           
         
           foreach ($song as $key => $value) { 
               if ($request->has($key)) {      
                   $song[$key] = $request->input($key);
               }
           }
          
           if ($request->input('id')) {
              
               $query = "
                   UPDATE `songs`
                   SET `name` = ?,
                       `author` = ?,
                       `date` = ?,
                       `url` = ?
                   WHERE `id` = ?
               ";
               $song['date'] = date("Y/m/d");
               $values = array_slice(array_values($song), 1);
               $values[] = $song['id']; 
               
               \DB::update($query, $values);
           } else {
             
               $query = "
                   INSERT
                   INTO `songs`
                   (`name`, `author`, `date`, `url`)
                   VALUES
                   (?, ?, ?, ?)
               ";
               \DB::update($query, array_slice(array_values($song), 1));
               $new_inserted_id = \DB::getPdo()->lastInsertId();
              
               $song['id'] = $new_inserted_id;
           }
          
           session()->flash('success_message', 'Success! You have saved it!');
    
           
           return redirect('edit?id='.$song['id']);
       }
       
       
       protected function getSongById($id)
       {
           $query = "
               SELECT *
               FROM `songs`
               WHERE `id` = ?
               LIMIT 1
           ";
           $songs = \DB::select($query, [$id]);
           if (!$songs) return null;
           
           $song = (array)$songs[0];
           return $song;
       }
   
}
