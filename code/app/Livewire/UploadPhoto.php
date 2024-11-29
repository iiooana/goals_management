<?php
//TEST
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Upoload Photo')]
class UploadPhoto extends Component
{
    use WithFileUploads;
    public $photo;
    public function render()
    {
        return view('livewire.upload-photo');
    }
    public function save()
    {
        $this->photo->store(path: 'photos');

    }
}
