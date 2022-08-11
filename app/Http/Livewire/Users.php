<?php

namespace App\Http\Livewire;

use App\Models\historiques;
use App\Models\User;
use App\Models\postes;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class Users extends Component
{
    public  $name,$totoalPages, $first_name,$last_name,$email,$password,$mailSentAlert,$showDemoNotification;
    public $updateMode = false;
   
   
    public  $search='';

    
    public $field;

    public $status;

    public $uniqueId;
    
    protected $queryString=[

        'search' =>['except'=>'']
           ];

    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];


    public function render (postes $postes)
    {
        
      
        $this->users= DB::table('historiques')
        ->when($this->name,function($query,$name){

            return $query->where('first_name','LIKE',"%$name%"); })
       
        ->join('users', 'users.id', '=', 'historiques.user_id')
        ->join('postes', 'postes.id', '=', 'historiques.poste_id')
        ->select('postes.*','users.*' )
        ->get();
    
        return view('livewire.users' );
  
    }


    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

  

    public function delete($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }

   
}
