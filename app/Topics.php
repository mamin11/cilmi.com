<?php

namespace App;
use App\Audio;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    protected $guarded = [];
    public $timestamps = true;

    public function episodes()
    {
        return $this->hasMany('App\Audio');
    }

    public function getNumberOfEpisodes()
    {
        //function to get all episodes of a topic
        $episodes = Audio::get()->where('topic', $this->id);

        $number = count($episodes);

        return $number;
    }

    public function getEpisodes()
    {
        $episodes = Audio::get()->where('topic', $this->id);

        return $episodes;
    }
}

//function to get all episodes of a specific topic