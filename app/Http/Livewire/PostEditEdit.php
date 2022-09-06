<?php

namespace App\Http\Livewire;

use App\Models\postes;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class PostEditEdit extends Component
{
    public $postes;
    public $state = [];
    public $password;
   public $updateMode = false;
    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];


    public function render()
    {

        $this->postes = postes::find(1);

        return view('livewire.post-edit-edit');
    }


    
    public function edit($id)
    {
        dd($id);
        $this->updateMode = true;

        $postes = postes::find($id);
        dd($id);

        $this->state = [

           'id' =>$postes->id,
            'poste_libele' => $postes->poste_libele,
            
        ];
    
    }
    private function resetInputFields(){
        $this->poste_libele = '';
        
    }
    public function mount($id)
    {
        $this->updateMode = true;
        $postes = postes::find($id);     
       $this->state = [
            'id' => $postes->id,
             'poste_libele' =>  $postes->poste_libele,
             
         ];

      
    } 
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        redirect()->intended('/post-edit');

    }

    public function update()
    {
        $validator = Validator::make($this->state,[
            
            'poste_libele' => 'required',
            
        ])->validate();
            
        if ($this->state['id']) {
            $postes = postes::find($this->state['id']);
            $postes->update([
                'id' => $this->state['id'],
                'poste_libele' => $this->state['poste_libele'],
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->reset('state') ; 
            $this->postes=postes::all();
            redirect()->intended('/post-edit');
        }
    }


}







   


   
  
    

    

 
            
        
