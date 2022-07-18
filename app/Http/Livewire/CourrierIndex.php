<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\courrier;
use Livewire\Component;
use App\Models\emeteur;
use App\Models\emplacement;
use App\Models\user;

class CourrierIndex extends Component
{
    public $courriers;

    public function mount()
    {
        $this->courriers = courrier::all();
    }

    public function delete($id)
    {
        if($id){
            courrier::where('id',$id)->delete();
            $this->Courriers = courrier::all();
        }
    }

    public function render()
    {
        $courr = courrier::all();

        return view('livewire.courrier-index',compact('courr'));
    }
}
