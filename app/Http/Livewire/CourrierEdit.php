<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\courrier;
use App\Models\emeteur;
use App\Models\user;
use App\Models\emplacement;

class CourrierEdit extends Component
{
     public $courrier;
     public $state = [];
    public $updateMode = false;

    public function edit($id)
    {
        $this->updateMode = true;

        $courriers = courrier::find($id);

        $this->state = [
            'courrier_id' => $courriers->courrier_id,
            'courrier_libele' => $courriers->courrier_libele,
            'emeteur_id' => $courriers->emeteur_id,
            'user_id' => $courriers->user_id,
            'emplacement_id' => $courriers->emplacement_id,
        ];
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
    public function mount($courrier)
    {
        //$this $id= new courrier;

        $this->courrrier =$id;
    }


    public function render()
    {

        $emet = emeteur::all();
        $dest = user::all();
        $empla = emplacement::all();
        return view('livewire.courrier-edit', compact('emet','dest','empla',));
    }
}
