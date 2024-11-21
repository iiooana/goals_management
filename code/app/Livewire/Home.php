<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Goal;

#[Title('Dashboard')]
class Home extends Component
{
    public $goals;
    public function mount(){
        $this->goals = Goal::orderBy('deadline','asc')->orderBy('id','asc')->get();
    }
    public function render()
    {
        return view('livewire.home');
    }
}
