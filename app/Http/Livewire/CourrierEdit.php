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
     public $Courrier;
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
        courrier::create($this->state);

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
        courrier::where()->update($this->state);
            $this->updateMode = false;
            $this->reset('state');
            $this->Courrier = courrier::all();

    }

    public function mount($id)
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
        courrier::create($this->state);
    }

    public function render()
    {
    $courrier = courrier::find(14);
        $emet = emeteur::all();
        $dest = user::all();
        $empla = emplacement::all();
        return view('livewire.courrier-edit', compact('emet','dest','empla','courrier'));
    }
}
