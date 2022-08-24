<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\postes;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class ViewDetails extends Component
{
    public $users;
    public  $showSavedAlert;
    public $state = [];
    public $password;
   public $updateMode = false;
    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];
    public function render()
    {
        
        return view('livewire.view-details');
    }


    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
    }

    // la function mount permet  de récupérer id et affiche les informations
    public function mount($id)
    {
        $this->postes= postes ::find($id);

        $this->updateMode = true;
        $users = User::find($id);     
       $this->state = [
            'id' =>$users->id,
             'first_name' => $users->first_name,
             'last_name' => $users->last_name,
             'email' => $users->email,
            'password' =>  $users->password,
         ];

      
    } 
    
// la function cancel de rentre dans l'interface users management
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        redirect()->intended('/users');

    }


  
}
