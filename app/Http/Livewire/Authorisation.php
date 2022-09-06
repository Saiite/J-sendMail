<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use App\Models\permission;
use Livewire\Component;

class Authorisation extends Component
{
    public function mount()
    {
        $this->permissions = permission::all();
    }

    public function render()
    {
        $per=permission::all();

        return view('livewire.authorisation',compact('per'));
    }
}
