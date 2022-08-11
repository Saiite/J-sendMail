<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Route;

use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        $notif=notification::all();
        return view('livewire.notification',compact('notif'));
    }
}
