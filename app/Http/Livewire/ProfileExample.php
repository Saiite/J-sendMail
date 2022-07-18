<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ProfileExample extends Component
{
    use WithFileUploads;
 
    public $images = [];
    public $users;
    public $title;
    public $email;
    public $showSavedAlert = false;
    public $showDemoNotification = false;

    public function rules()
    {
        return [
        'user.first_name' => 'max:15',
        'user.last_name' => 'max:20',
        'user.email' => 'email',
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
    }

    public function save()
    {
        $this->validate([
            'images.*' => 'image|max:1024', // 1MB Max
        ]);
 
        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('images');
        }
    
        $this->images = json_encode($this->images);

        Image::create(['image' => $this->images]);
 
        session()->flash('success', 'Images has been successfully Uploaded.');
 
        return redirect()->back();
    }

    public function update()
    {
        $this->validate($this->rules());

        $this->user->save();

        

        return redirect()->route('livewire.profile-example');
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = time().'.'.$request->image->extension();  
         
        $request->image->move(public_path('images'), $imageName);
      
        Image::create(['name' => $imageName]);
        
        return response()->json('Image uploaded successfully');
    }

    public function render()
    {
        return view('livewire.profile-example');
    }
}
