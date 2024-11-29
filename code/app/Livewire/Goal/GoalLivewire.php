<?php

namespace App\Livewire\Goal;

use Livewire\Component;
use App\Livewire\Forms\GoalForm;
use App\Models\Goal;

class GoalLivewire extends Component
{
    public GoalForm $form;
    public $is_new;

    public function mount(int $id = null){
        $this->is_new =true;
        $this->form->deadline = date('Y-m-d H:i',strtotime('+6 hours'));
        
        if(!empty($id)){
            $goal =  Goal::findOrFail($id);
            $this->is_new = false;
            $this->form->set($goal);
        }
    }

    public function render()
    {
        return view('livewire.goal.add-edit')->title($this->is_new == true ? 'Add Task' : 'Edit Task');
    }

    public function save(){
        $this->form->save();
        session()->flash('success','Task '.($this->is_new === true  ? 'added.': 'saved.')); 
       return $this->redirect("/",navigate:true);
    }
}
