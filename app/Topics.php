<?php

namespace App;
use App\Audio;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    public function episodes()
    {
        return $this->hasMany('App\Audio');
    }

    public function getEpisodes()
    {
        //function to get all episodes of a topic
        $episodes = Audio::get()->where('id', $this->id)->first();

        return $episodes;
    }
}

//function to get all episodes of a specific topic