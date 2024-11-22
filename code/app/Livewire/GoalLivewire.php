<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\GoalForm;
use App\Models\Goal;

class GoalLivewire extends Component
{
    public GoalForm $form;
    public $is_new;

    public function mount(int $id = null){
        $this->is_new =true;
        
        if(!empty($id)){
            $goal =  Goal::findOrFail($id);
            $this->is_new = false;
            $this->form->set($goal);
        }
    }

    public function render()
    {
        return view('livewire.goal');
    }

    public function save(){
        $this->form->save();
       // session()->flash('success','Goal added!'); 
       return redirect("/")->with('success',$this->is_new === true  ? 'Goal added.': 'Goal saved.');
    }
}
