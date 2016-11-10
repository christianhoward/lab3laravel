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

    public function addPlayer(Request $request) {
        $input = $request->all();
        $input = lara_player::create($input);
        return json_encode(array($data));
    }
    
    public function updatePlayer($id, Request $request) {
        $data = lara_player::find($id);
        $input = $request->all();
        $data->fill($input)->save();
        return json_encode(array($data));
    }
    
    public function deletePlayer($id) {
        $data = lara_player::find($id);
        $data->delete();
        return json_encode(array($data));
    }
}
