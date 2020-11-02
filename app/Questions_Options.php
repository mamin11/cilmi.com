<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;

class Questions_options extends Model
{
    protected $guarded = [];
    public $timestamps = true;
    

    public function isCorrect()
    {
        if($this->state === 1)
        {
            return true;
        }
        return false;
    }

    public function findQuestion() 
    {
        $questions = Question::get()->where('id', $this->question_id)->first();
        return $questions;
    }
}
