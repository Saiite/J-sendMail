<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\poste;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class Users extends Component
{
    public $totoalPages, $mailSentAlert,$showDemoNotification;
    public $updateMode = false;
    protected $users;
    public $name;
    public $field;
    public  $search='';
    public $status;

    public function mount()
    {
        $this->users = User::all();
    }


//cette fonction permet de faire le changement de status utilisateur

public function changeStatut($id)
{
    dd('je sus la');
    if($id){
        $users = User::find($id);


        $this->state = [
            'id' => $users->id,
            'status'=> $users->status,


        ];

        if( $users->status=='actif'){
            User::where('id',$id)->update(['status'=>'inactif']);
            redirect()->intended('/users')->with('message', 'utilisateur est inatif maintenat.');

           }else{
            User::where('id',$id)->update(['status'=>'actif']);
               redirect()->intended('/users');
               session()->flash('messag', 'utilisateur est maintenant actif.');
               }
       // $courriers =DB::table('courriers')->where('courrier_status','enStok')->update(['courrier_status'=>'enCours']);

    }
}

  // la fonction permet de supprimer les utilisateur

    public function delete($id)
    {
        if($id){
            if($id==1){
                redirect()->intended('/users');
                session()->flash('messag', 'vous ne pouvez pas suprimer un admin');
            }else{
                User::where('id',$id)->delete();
                redirect()->intended('/users');
            session()->flash('message', 'utilisateur supprimé avec succès .');
            }

        }
    }
// cette fonction permet de faire la jointure entre la table users , post et historiques

public function render ()
{
    $this->users=User::when($this->name,function($query,$name){
        return $query->where ('first_name','LIKE',"%$name%");
    })->orderByRaw('id DESC')->paginate(5);

    return view('livewire.users');

}

}
