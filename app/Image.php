<?php
//this model represents the speaker
namespace App;
use App\Audio;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];
    public $timestamps = true;

    public function episodes()
    {
        return $this->hasMany('App\Audio');
    }

    public function getEpisodes()
    {
        //function to get all episodes of a speaker
        $episodes = Audio::get()->where('id', $this->id)->first();

        return $episodes;
    }

    public function getNumberOfEpisodes()
    {
        //function to get all episodes of a topic
        $episodes = Audio::get()->where('speaker', $this->id);

        $number = count($episodes);

        return $number;
    }
}
