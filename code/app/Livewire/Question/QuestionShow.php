<?php

namespace App\Livewire\Question;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Question;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class QuestionShow extends Component
{
    use WithPagination;

    public Subject $subject;
    public $query = '';
    public $question_id = null;
        
    public function mount($subject_id,$question_id = null){
 
       if(!empty($question_id) && Question::where('id',$question_id)->count() > 0){
           $this->question_id = $question_id;
       }
      // dd($this->question_id,Question::where('id',$question_id)->count() );
        $this->subject = Subject::findOrFail($subject_id);
    }
    
    #[On('question-edit')]
    public function render()
    {
        $questions = null;
        if($this->subject->questions->count() > 0){
            $questions = $this->subject->questions()->where('text','ilike','%'.$this->query.'%')->orderBy('created_at','desc')->paginate(15);
        }
        return view('livewire.question.question-show',[
            "questions" => $questions,
        ])->title("Questions of ".$this->subject->name);
    }

    public function delete($question_id){
        Question::where('id',$question_id)->delete();
    }

}
