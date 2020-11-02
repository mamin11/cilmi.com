<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\RedirectResponse;

class QuestionComponent extends Component
{
    public $questions;
    public $results;

    // public function mount($questions)
    // {
    //     $this->questions = $questions;
    // }

    public function render()
    {

        // @dump($questions);
        return view('livewire.question-component', ['questions' => $this->questions]);
    }

    public function showResults()
    {
        //return view('livewire.results-component');
        
        // return <<<'blade'
        // <div class="container mt-5 bg-dark">
        //     <div class="d-flex justify-content-center row">
        //         <div class="col-md-10 col-lg-10">
        //             <h4 class="text-dark">
        //                 You Scored 9/10
        //             </h4>
        //         </div>
        //     </div>
        // </div>
        // blade;

        return redirect()->route('results');
    }
}
