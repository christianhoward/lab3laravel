<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lara_player extends Model
{
    protected $table = 'lara_players';
    protected $fillable = [
        'playername',
        'age',
        'city',
        'country',
        'gender',
        'handedness',
        'broom',
        'position',
        'team',
        'favoritecolor',
        'headshot'
    ];
}
