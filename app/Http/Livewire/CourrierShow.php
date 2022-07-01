<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\courrier;
use Livewire\Component;
use App\Models\emeteur;
use App\Models\emplacement;
use App\Models\user;

class CourrierShow extends Component
{
    public $courrier;
    public $state = [];
    public $updateMode = false;

    public function mount(Courrier $courrier)
    {
        $this->courrrier = courrier::all();
    }
    public function update()
    {

        $validator = Validator::make($this->state, [
            'courrier_libele' => 'required|max:100',
            'courrier_date_arrive' =>'required|max:100',
            'emeteur_id' => 'required|max:100',
            'user_id' => 'required|max:100',
            'emplacement_id' => 'required|max:100'
        ])->validate();
        dd('je suis la');

        if ($this->state['id']) {
            $courriers = courrier::find($this->state['id']);
            $courriers->update([
                'courrier_libele' => $this->state['courrier_libele'],
                'courrier_date_arrive' => $this->state['courrier_date_arrive'],
                'emeteur_id' => $this->state['emeteur_id'],
                'user_id' => $this->state['user_id'],
                'emplacement_id' => $this->state['emplacement_id'],
            ]);
            dd('je suis la');
            $this->updateMode = false;
            $this->reset('state');
            $this->Courrier = courrier::all();
        }
    }

    public function render()
    {
        $courr = courrier::all();
        return view('livewire.courrier-show',compact('courr'));
    }
}
