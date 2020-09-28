<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Audio;

class SearchDropdown extends Component
{
    public $search = '';

   
    public function render()
    {
        $results = [];

        if(strlen($this->search) >= 3){
            $results = Audio::where('title', 'LIKE', '%' . $this->search . '%')->get();
        }
        return view('livewire.search-dropdown', [
            'results' => collect($results)->take(7),
        ]);
    }
}
