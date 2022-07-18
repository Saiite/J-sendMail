<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Models\emeteur;

class EmeteurIndex extends Component
{
    public $emeteurs;

    public function mount()
    {
        $this->emeteurs = emeteur::all();
    }

    public function delete($id)
    {
        if($id){
            emeteur::where('id',$id)->delete();
            $this->emeteurs = emeteur::all();
        }
    }
    public function render()
    {
        $emet=emeteur::all();
        return view('livewire.emeteur-index',compact('emet'));
    }
}
