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
            redirect()->intended('/courrier-index')->with('message', 'le courrier a été dupprimé avec succès.');

        }
    }

    public function render()
    {
        $courr = courrier::paginate(5);

        return view('livewire.courrier-index',compact('courr'));
    }
    public function changeStatut($id)
    {
        if($id){
            $courriers = courrier::find($id);

            $this->state = [
                'id' => $courriers->id,
                'courrier_libele' => $courriers->courrier_libele,
                'courrier_date_arrive'=>$courriers-> courrier_date_arrive,
                'courrier_status'=>$courriers-> courrier_status,
                'emeteur_id' => $courriers->emeteur_id,
                'user_id' => $courriers->user_id,
                'emplacement_id' => $courriers->emplacement_id,
            ];
            if($courriers-> courrier_status=='enCours'){
          courrier::where('id',$id)->update(['courrier_status'=>'destoke']);
          redirect()->intended('/courrier-index')->with('message', 'le courrier a ete destocké avec succès.');
        }else{
            redirect()->intended('/courrier-index')->with('messag', 'le courrier na pas ete valider par le destinataire ou courrier destocké.');
            }
       // $courriers =DB::table('courriers')->where('courrier_status','enStok')->update(['courrier_status'=>'enCours']);
    }
}
}
