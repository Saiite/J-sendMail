<?php

namespace App\Http\Livewire;
use App\Models\postes;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class PostEdit extends Component
{

    public $postes,  $mailSentAlert,$showDemoNotification, $post_id;
    public $updateMode = false;
    public $search = '';
    use WithPagination;

    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];


 
    public function store()
    {
        $this->validate([
            'poste_libele' => 'required',
         
        ]);

        $postes= postes::create([
            'poste_libele' =>$this->poste_libele,
            
            
        ]);
        redirect()->intended('/post');
    }

    public function routeNotificationForMail() {
        return $this->email;
    }


    public function edit($id)
    {
        $this->updateMode = true;
        $postes = postes::find($id);
 
        $this->state = [
             'id' => $postes->id,
            'poste_libele' => $postes->poste_libele,
        ];

        redirect()->intended('/post-edit');
    }
    private function resetInputFields(){
        $this->reset('state');
    }

    public function update()
   {
   

       $validator = Validator::make($this->state, [
           'poste_libele' => 'required|max:100',
       ])->validate();
       
       if ($this->state['id']) {
        $postes = postes::find($this->state['id']);
        $postes->update([
               'poste_libele' => $this->state['poste_libele'],
         

            ]);

            
            
           $this->updateMode = false;
           $this->reset('state');
           $this->postes = postes::all();
       }
   }



    public function mount()
    {
        $this->postes = postes::all();
    }

    public function render()
    {
        
        $postes =postes::all();
        $postes= postes::find(1);
        
       
        return view('livewire.post-edit', compact('postes'));
    }

    public function show(postes $postes)
{
    $postes->with('users')->get(1);
    return view('show', compact('postes'));
}



    }







