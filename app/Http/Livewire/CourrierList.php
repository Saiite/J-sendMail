<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\courrier;
use App\Models\emeteur;
use App\Models\user;
use App\Models\emplacement;


use Livewire\Component;
class CourrierList extends Component
{

    public $Courrier;
    public $state = [];
    public $updateMode = false;


    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'courrier_libele' => 'required|max:100',
            'courrier_date_arrive' => 'required|max:100',
            'emeteur_id' => 'required|max:100',
            'user_id' => 'required|max:100',
            'emplacement_id' => 'required|max:100',
        ])->validate();
        courrier::create($this->state);
        $this->reset('state');
        $this->Courrier = courrier::all();
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->reset('state');
    }

    public function delete($id)
    {
        if($id){
            courrier::where('id',$id)->delete();
            $this->Courrier = courrier::all();
        }
    }

    public function render()
    {
        $emet = emeteur::all();
        $dest = user::all();
        $empla = emplacement::all();
        return view('livewire.courrier-list', compact('emet','dest','empla'));
    }
}
