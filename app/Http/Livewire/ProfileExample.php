<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Image;
use App\Models\postes;
use Livewire\Component;
use App\Models\historiques;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;


use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProfileExample extends Component
{
    use WithFileUploads;
 
    public $images = [];
    public $users;
    public  $postes;
    public $title;
    public $poste_libele;
    public $email;
    
    public $showSavedAlert = false;
    public $showDemoNotification = false;
    public $showData = true;
    public $createData = false;
    public $updateData = false;


    public $image;

    public $edit_id;
    public $edit_title;
    public $old_image;
    public $new_image;
    use WithFileUploads;
 
    public $photo;

    public function rules()
    {
        return [
        'user.first_name' => 'max:15',
        'user.last_name' => 'max:20',
        'user.email' => 'email',
        'postes.poste_libele'=>'poste_libele',
        'user.gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
        'user.address' => 'max:40',
        'user.number' => 'numeric',
        'user.city' => 'max:20',
        'user.ZIP' => 'numeric',
       
    ];
    
    }
   
    public function mount()

    {
        $this->user = auth()->user();
        $historiques = historiques::where('user_id',$this->user->id)->first();
        $this->postes= postes::find($historiques->poste_id);
    }


    public function resetField()
    {
        $this->title = "";
        $this->image = "";
        $this->new_image = "";
        $this->old_image = "";
       
    }

        use WithFileUploads;

    public function create()
    {
     
        
        $images = new Image();
        $this->validate([
            
            'image' => 'image|max:4024',
        ]);

       


        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('posts', 'public');
        } else {
            $filename = Null;
        }
        session()->flash('message', 'vous avez  modifié un poste avec succès.');
 
        $images->images = $filename;

        // dd($filename);

        $result = $images->save();
        $users=User::where('email',$this->user->email)->update(['image_id'=>$images->id]);
        session()->flash('message', 'vous avez  modifié un poste avec succès.');
        if ($result) {
            session()->flash('success', 'Add Successfully');
            $this->resetField();
            $this->showData = true;
            $this->createData = false;
        } else {
            session()->flash('error', 'Not Add Successfully');
        }
    }


   
    public function render()
    {
        $this->users = User::all();
        return view('livewire.profile-example');
    }
}
