<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersEdit extends Component
{
    public $users;
    public $state = [];
   public $updateMode = false;

   
    public function render()
    {
        return view('livewire.users-edit');
    }
   

    public function store()
    {
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        Users::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

    }

    
    //cette fonction permet de de recuperer et remplir les information d'un users
    public function edit($id)
    {
        $this->updateMode = true;
        $users = User::find($id);

        $this->state = [
            'first_name' =>$this->first_name,
            'last_name' =>$this->last_name,
            'email' =>$this->email,
            'password' => Hash::make($this->password),
            
            'remember_token' => Str::random(10),
        ];
    }
    private function resetInputFields(){
        $this->reset('state');
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

  

        //cette fonction permet de modifier les information d'un usersdepuis la base des donnees .
    public function update()
    {
        $validator = Validator::make($this->state, [
           'first_name' => 'required',
        
            'last_name' => 'required',
            'email' => 'required|email',
            
        ])->validate();

        if ($this->user_id) {
            $user = Users::find($this->user_id);
            $user->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            $this->reset('state');
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();
        }
    }
 //cette fonction nous permet d'initialiser lers valeurs du courrier et recupere l'id user a modiffier.
 public function mount($id)
 {
     $this->updateMode = true;
     $users = User::find($id);
     $this->state = [
        'first_name' =>$this->first_name,
        'last_name' =>$this->last_name,
        'email' =>$this->email,
        'password' => Hash::make($this->password),
        
        'remember_token' => Str::random(10),
    ];
    $user = User::create($this->state);
 }
    public function delete($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
        
    }
}
