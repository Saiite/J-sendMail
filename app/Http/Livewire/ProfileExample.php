<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\permission;
use Livewire\WithFileUploads;


class ProfileExample extends Component
{


    use WithFileUploads;

    public $photos = [];

    public function render()
    {
        $per=permission::all();

        return view('livewire.profile-example',compact('per'));
    }

    public function save()
    {
        $this->validate([
            'photos.*' => 'image|max:10240', // 1MB Max
        ]);

        foreach ($this->photos as $photo) {
            $photo->storePublicly('photos', 's3');
        }
        $this->photos = [];
        session()->flash('message', 'File Uploaded !');
    }

    public function remove($index)
    {
        array_splice($this->photos, $index, 1);
    }
}
