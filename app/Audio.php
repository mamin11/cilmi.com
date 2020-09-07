<?php

namespace App;
use App\Image;
use App\Topics;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $guarded = [];

    public function speaker()
    {
        return $this->belongsTo('App\Image', 'speaker');
    }

    public function getSpeaker() 
    {
        $speaker = Image::get()->where('id', $this->speaker)->first();
        return $speaker;
    }

    public function getTopic() 
    {
        $topic = Topics::get()->where('id', $this->topic)->first();

        return $topic;
    }
}
