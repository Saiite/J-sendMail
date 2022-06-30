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

    public function delete($id)
    {
        if($id){
            courrier::where('id',$id)->delete();
            $this->Courrier = courrier::all();
        }
    }
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

    public function render()
    {
        $courr = courrier::all();

        return view('livewire.courrier-index',compact('courr'));
    }
}
