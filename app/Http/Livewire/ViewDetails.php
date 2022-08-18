<?php

namespace App\Http\Livewire;

use App\Models\User;
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
    public function edit($id)
    {
        dd($id);
        $this->updateMode = true;

        $users = User::find($id);
        dd($id);

        $this->state = [

           'id' =>$users->id,
            'first_name' => $users->first_name,
            'last_name' => $users->last_name,
            'email' => $users->email,
            'password' =>  $users->password,
        ];
    
    }
    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
    }
    public function mount($id)
    {
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
    

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        redirect()->intended('/users');

    }

    public function update()
    {
        $validator = Validator::make($this->state,[
            
            'first_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'password' =>'required',
        ])->validate();
            
        if ($this->state['id']) {
            $users = User::find($this->state['id']);
            $users->update([
                'id' => $this->state['id'],
                'first_name' => $this->state['first_name'],
                'last_name' => $this->state[ 'last_name'],
                'email' => $this->state['email'],
                'password' => $this->state['password' ],
            ]);
            $this->updateMode = false;
            session()->flash('message', 'utilisateur modifié avec succès');
            $this->reset('state') ; 
            $this->users=User::all();
            redirect()->intended('/profile-example');
        }
    }

    public function delete($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }

}
