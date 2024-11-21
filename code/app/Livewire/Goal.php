<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\GoalForm;

#[Title('Add Task')]   
class Goal extends Component
{
    public GoalForm $form;

    public function render()
    {
        return view('livewire.goal');
    }

    public function save(){
        $this->form->add();
        session()->flash('success','Goal added!');
    }
}
