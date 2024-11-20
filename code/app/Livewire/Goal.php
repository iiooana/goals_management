<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Add/Edit Goal')]   
class Goal extends Component
{
    public function render()
    {
        return view('livewire.goal');
    }
}
