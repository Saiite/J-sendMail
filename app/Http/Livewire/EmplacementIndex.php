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

    public function delete($id)
    {
        if($id){
            emplacement::where('id',$id)->delete();
            $this->emplacements = emplacement::all();
        }
    }
    public function render()
    {
        $empla=emplacement::all();

        return view('livewire.emplacement-index',compact('empla'));
    }
}
