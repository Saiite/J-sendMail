<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\emplacement;

class EmplacementIndex extends Component
{
    public $courriers;

    public function mount()
    {
        $this->courriers = emplacement::all();
    }
    public function render()
    {
        $empla=emplacement::paginate(5);

        return view('livewire.emplacement-index',compact('empla'));
    }
}
