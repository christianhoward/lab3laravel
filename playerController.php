<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\lara_player;

class playerController extends Controller
{
    
    public function readPlayers() {
        $data = DB::table('lara_players')->get();
        return json_encode($data);
    }
    
    public function readSpecificPlayer($id) {
        return lara_player::find($id);
        return json_encode(array($data));
    }
    /*
    public function addPlayer() {
        $data = new lara_player;
        $data->playername = Input::get('Player_Name');
        $data->age = Input::get('Age');
        $data->city = Input::get('City');
        $data->country = Input::get('Country');
        $data->gender = Input::get('Gender');
        $data->handedness = Input::get('Handedness');
        $data->broom = Input::get('Broom');
        $data->position = Input::get('Position');
        $data->team = Input::get('Team');
        $data->favoritecolor = Input::get('Favorite_Color');
        $data->headshot = Input::get('Headshot');
        $data->save();
        
        Session::flash('message', 'Successfully created player!');
        return json_encode($data);
    }
    
    public function updatePlayer($id) {
        $data = lara_player::find($id);
        $data->playername = Input::get('Player_Name');
        $data->age = Input::get('Age');
        $data->city = Input::get('City');
        $data->country = Input::get('Country');
        $data->gender = Input::get('Gender');
        $data->handedness = Input::get('Handedness');
        $data->broom = Input::get('Broom');
        $data->position = Input::get('Position');
        $data->team = Input::get('Team');
        $data->favoritecolor = Input::get('Favorite_Color');
        $data->headshot = Input::get('Headshot');
        
        Session::flash('message', 'Successfully updated player!');
        return json_encode($data);
    }
    
    public function deletePlayer($id) {
        //DB::table('lara_players')->where('id', $id)->delete();
        $data = lara_player::find($id);
        $data->delete();
        
        Session::flash('message', 'Successfully deleted the player!');
        return Redirect::to('players');
    }
    */
}
