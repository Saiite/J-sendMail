<?php

namespace App\Http\Livewire;
use App\Models\postes;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class PostEdit extends Component
{

    public $postes,$name,  $mailSentAlert,$showDemoNotification, $post_id;
    public $updateMode = false;
   
   

    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];

    public function render()
    {
        $postes=postes::when($this->name,function($query,$name){

            return $query->where('poste_libele','LIKE',"%$name%");
        });

        $this->postes = postes::all();
       
       
        return view('livewire.post-edit', compact('postes'));
    }



    }







