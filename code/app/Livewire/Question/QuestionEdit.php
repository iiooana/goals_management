<?php

namespace App\Livewire\Question;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Question;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Locked;

#[Title('Question')]

class QuestionEdit extends Component
{
    public ?Question $question;
    #[Validate('required|min:6')]
    public $question_text;
    #[Locked]
    public $subject_id;
    #[Locked]
    public $question_id;

  

    public function mount($subject_id,$question_id)
    {
        $this->subject_id = $subject_id;
        if(!empty($question_id)){
            $question = Question::findOrFail($question_id);
            $this->question_id =  $question_id;
            $this->question_text = $question->text;
        }
    }

    public function render()
    {
        return view('livewire.question.question-edit');
    }

    
    public function save()
    {
        $this->validate();
        $this->question =  new Question();
        if(!empty($this->question_id)){
            $this->question =  Question::findOrFail($this->question_id);
        }
       
        $this->question->text = $this->pull('question_text');
        $this->question->subject_id = $this->subject_id;
        //dd($this->question);
        $this->question->save();
        $this->dispatch('question-edit');
        return back()->with('success','Saved with success!');
    }
}
