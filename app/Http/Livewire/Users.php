<?php

namespace App\Http\Livewire;

use App\Models\historiques;
use App\Models\User;
use App\Models\postes;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class Users extends Component
{
    public $users,  $first_name,$last_name,$email,$password,$mailSentAlert,$showDemoNotification, $user_id;
    public $updateMode = false;
    public $search = '';
    use WithPagination;
    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];
    public function render (postes $postes)
    {
        $this->users = User::all();
        $postes = postes::all();
        $users = DB::table('users')->simplePaginate(3);
        $this->users= DB::table('historiques')
        ->join('users', 'users.id', '=', 'historiques.user_id')
        ->join('postes', 'postes.id', '=', 'historiques.poste_id')
        ->select('postes.*','users.*' )
        ->get();

        return view('livewire.users', compact('postes'));

    }



    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
    }

    

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }


    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'password' => Hash::make($this->password),
        ]);

        if ($this->user_id) {
            $user = Users::find($this->user_id);
            $user->update([
                'first_name' => $this->first_name,
                'first_name' => $this->first_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'remember_token' => Str::random(10),

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
