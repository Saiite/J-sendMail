<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\postes;
use Livewire\Component;
use App\Models\historiques;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;

class LiveTable extends Component
{
    public $users,  $poste_id,$poste_libele,$historiques, $first_name,$last_name,$email,$password,$mailSentAlert,$showDemoNotification, $user_id;
    public $updateMode = false;
    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];

    public $postes='';
    public $state = [];
    public function render()
    {
        $this->users = User::all();
        $dest = postes::all();
        
        return view('livewire.live-table', compact('dest'));
    }

    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';

    }
//l'enregistrement utilisateur avec une table étrange postes et historiques comme jointure
    public function store()
    {
        
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
          
           
           
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'first_name' =>$this->first_name,
            'last_name' =>$this->last_name,
          
            'email' =>$this->email,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
            
        ]);
       
       
        $historiques=historiques::create([

            'poste_id' => $user->id,
            'user_id' => $user->id,

        ]);
        
        $validator = Validator::make($this->state, [
            'poste_libele' => 'required|max:100',
        ])->validate();

        postes::create($this->state);
        session()->flash('message','postes avec succès!');
        $this->reset('state');
        $this->postes = postes::all();
        
        redirect()->intended('/users')->with('message', ' vous avez enregistré un utilisateur avec  succès.');
    }
    public function routeNotificationForMail() {
        return $this->email;
    }

//la fonction de retour sur l'interface utilisateur management


    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        redirect()->intended('/users');

    }

}

  



