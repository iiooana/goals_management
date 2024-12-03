<?php

namespace App\Livewire\Quiz;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Subject;
use Livewire\Attributes\Validate;

#[Title('New Quiz')]  
class QuizCreate extends Component
{
    public $step = 1;
    #[Validate('required')]
    public $subject_id;
    #[Validate('required|min:1')]
    public $n_questions;

    public function render()
    {
        $params = [];
        if($this->step == 1){
            //todo check if has questions...
            $params['subject_options'] = Subject::select('name','id')->orderBy('name','asc')->get()->toArray();
        }
        return view('livewire.quiz.quiz-create',$params);
    }
    public function step1(){
        $this->validate();
        $this->step = 2;
    }
}
