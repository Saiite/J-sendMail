<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\courrier;
use Livewire\Component;
use App\Models\emeteur;
use App\Models\emplacement;
use App\Models\user;

class CourrierUser extends Component
{
    public $courriers;

    public function mount()
    {
        $this->courriers = courrier::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        $courr = courrier::where('user_id', auth()->user()->id)->get();
        return view('livewire.courrier-user',compact('courr'));

    }
    public function changeStatut($id)
    {
        if($id){
         courrier::where('id',$id)->update(['courrier_status'=>'enCours']);
       // $courriers =DB::table('courriers')->where('courrier_status','enStok')->update(['courrier_status'=>'enCours']);
    }
}
}
