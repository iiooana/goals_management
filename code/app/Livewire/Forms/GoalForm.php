<?php

namespace App\Livewire\Forms;


use Livewire\Form;
use App\Models\Goal;

class GoalForm extends Form
{
    public $title;
    public $description;
    public $deadline;
    #public $goal Goal;

    public function rules(){
        //todo check deadline
        return [
            "title" => ['required'],
        ];  
    }
    
    public function add(){
        $this->validate();
        Goal::create($this->pull());
    }
}
