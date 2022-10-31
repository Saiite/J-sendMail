<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\emplacement;

class EmplacementIndex extends Component
{
    public $courriers;
    public $name;

    public function mount()
    {
        $this->courriers = emplacement::all();
    }
    public function render()
    {
        $empla=emplacement::when($this->name,function($query,$name){
            return $query->where ('emplacement_noms','LIKE',"%$name%");
        })->orderByRaw('id DESC')->paginate(5);

        return view('livewire.emplacement-index',compact('empla'));
    }

    public function delete($id)
{
    if($id){
        if($id==1){
            redirect()->intended('/emplacement-index');
            // session()->flash('messag', 'vous ne pouvez pas suprimer un cette emplacement');
        }else{
            emplacement::where('id',$id)->delete();
            redirect()->intended('/emplacement-index');
        session()->flash('message', 'emplacement supprimé avec succès .');
        }

    }
}
}


