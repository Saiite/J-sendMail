<?php

namespace App\Http\Livewire;

use App\Models\User;

use Livewire\Component;

class Users extends Component
{
    public $users,  $first_name,$email, $user_id;
    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        
        return view('livewire.users');
    }

    private function resetInputFields(){
        $this->first_name = '';
        $this->email = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'email' => 'required|email',
        ]);

        Users::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = Users::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = Users::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

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