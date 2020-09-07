<?php
//this model represents the speaker
namespace App;
use App\Audio;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

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
}
