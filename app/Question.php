<?php

namespace App;
use App\Questions_options;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    public $timestamps = true;

    public function options()
    {
        return $this->hasMany('App\Questions_Options');
    }

    public function getOptions()
    {
        $options = Questions_options::inRandomOrder()->get()->where('question_id', $this->id);
        return $options;
    }

    public function getRightAnswer()
    {
        $option = Questions_options::where([
            ['question_id', '=', $this->id],
            ['state',  '=', '1']
            ])->get();
        return $option;   
    }
}
