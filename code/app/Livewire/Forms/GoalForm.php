<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rules;
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
            "title" => ['require'],
        ];  
    }
    
    public function add(){
        $this->validate();
        dd($this);
    }
}
