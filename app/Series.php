<?php

namespace App;
use App\Audio;
use App\Image;


use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded = [];
    public $timestamps = true;

    public function episodes()
    {
        return $this->hasMany('App\Audio');
    }

    //series column currently does not exist in episodes
    public function getNumberOfEpisodes()
    {
        //function to get all episodes of a series
        $serie = $this::get()->where('id', $this->id)->first();

        $seriesEpisodes = json_decode($serie->episodes);

        if($seriesEpisodes > 0) 
        {
        $number = count($seriesEpisodes);
        } 
        else {
            $number = 0;
        }

        return $number;
    }

    public function getSpeaker()
    {
        $speaker = Image::get()->where('id', $this->speaker)->first();
        return $speaker;
    }

    public function getEpisodes()
    {
        $array = $this->episodes;
        
        $episodes = Audio::get()->where('id', arrayID);

        return $episodes;
    }
}
