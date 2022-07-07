<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\courrier;
use Livewire\Component;
use App\Models\emeteur;
use App\Models\emplacement;
use App\Models\user;

class CourrierShow extends Component
{
    public $courrier;
    public $state = [];
    public $updateMode = false;

    public function mount(Courrier $courrier)
    {
        $this->courrrier = courrier::all();
    }

    public function render()
    {

        return view('livewire.courrier-show');
    }
}
