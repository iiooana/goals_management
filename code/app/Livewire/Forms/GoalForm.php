<?php

namespace App\Livewire\Forms;


use Livewire\Form;
use App\Models\Goal;

class GoalForm extends Form
{
    public $title;
    public $description;
    public $deadline;
    public ?Goal $goal;


    public function rules(){
        return [
            "title" => ['required'],
        ];  
    }

    public function set(Goal $goal){
        $this->goal = $goal;
        $this->title = $goal->title;
        $this->description = $goal->description;
        $this->deadline = $goal->deadline;
    }
    
    public function save(){
        $this->validate();
        if(!empty($this->goal) && !empty($this->goal->id)){
            $this->goal->title = $this->title;
            $this->goal->description = $this->description;
            $this->goal->deadline = empty($this->deadline) ? null : $this->deadline;
            $this->goal->save();
        }else{
            Goal::create($this->pull());
        }
    }
}
