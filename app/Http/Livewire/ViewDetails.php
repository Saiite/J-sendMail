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
use App\Models\permission;
use App\Models\userPermission;
use Illuminate\Support\Facades\DB;
class ViewDetails extends Component
{
    public $permiss= [];
    public $users;
    public $authorise= [];
    public  $showSavedAlert;
    public $state = [];
    public $password;
   public $updateMode = false;
    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];
    public function inserpermission()
{
$user= $this->state['id'];
$permission=$this->permiss;

foreach($this->permiss as $per){
    $this->authorise = [
        'user_id' =>$user,
        'permission_id' => $per,
    ];

    userPermission::create($this->authorise);
}
//redirect()->intended('/view-details')->with('message', 'permission ajouter avec succès.');
}
public function deletepermission()
{
$user= $this->state['id'];
$permission=$this->permiss;

foreach($this->permiss as $per){
    $this->authorise = [
        'user_id' =>$user,
        'permission_id' => $per,
    ];
    userPermission::where($this->authorise)->delete();
}
//redirect()->intended('/view-details')->with('messag', 'permission supprimé avec succès.');
}
//$user->permissions()->attach($permission);


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
        $per = permission::find($id);

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



        // if (("per").checked === true) {
        //    //bla bla bla//
        // }



    public function render()
    {
        // $per= DB::table('user_permissions')
        // ->join('users', 'users.id', '=', 'user_permissions.user_id')
        // ->join('permissions', 'permissions.id', '=', 'user_permissions.permission_id')
        // ->select('permissions.*','users.*' )
        // ->get();
         $per=permission::all();

        return view('livewire.view-details',compact('per'));
    }







}


