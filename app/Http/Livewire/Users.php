<?php

namespace App\Http\Livewire;

use App\Models\historiques;
use App\Models\User;
use App\Models\postes;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class Users extends Component
{
    public  $name,$totoalPages, $mailSentAlert,$showDemoNotification;
    public $updateMode = false;


    public  $search='';


    public $field;

    public $status;




// cette fonction permet de faire la jointure entre la table users , post et historiques

    public function render (postes $postes)
    {

        $users = User::find(1)->paginate(5);
        $this->users= DB::table('historiques')
        ->when($this->name,function($query,$name){

            return $query->where('first_name','LIKE',"%$name%"); })

        ->join('users', 'users.id', '=', 'historiques.user_id')
        ->join('postes', 'postes.id', '=', 'historiques.poste_id')
        ->select('postes.*','users.*' )

        ->orderByRaw('user_id DESC')

        ->get();

        return view('livewire.users' );

    }

//cette fonction permet de faire le changement de status utilisateur

    public function changeStatut($id)
    {
        if($id){

            $users = User::find($id);

            $this->state = [
                'id' => $users->id,
                'status'=> $users->status,

            ];

            if( $users->status=='actif'){
                User::where('id',$id)->update(['status'=>'inactif']);
                redirect()->intended('/users')->with('messag', 'utilisateur est inatif .');

               }else{
                User::where('id',$id)->update(['status'=>'actif']);
                   redirect()->intended('/users');
                   session()->flash('message', 'utilisateur est maintenant actif.');
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


}
