<?php

namespace App\Livewire\Quiz;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Subject;
use Livewire\Attributes\Validate;
use App\Models\Question;
use App\Models\QuizQuestion;
use App\Models\Quiz;
use Illuminate\Support\Facades\Session;

#[Title('New Quiz')]  
class QuizCreate extends Component
{
    public $step = 1;
    #[Validate('required')]
    public $subject_id;
    #[Validate('required|min:1')]

    public $n_questions;
    public array $questions;
    public float $score = 0;

    protected function setScore(){
        $this->score = QuizQuestion::where('quiz_id',Session::get('quiz_id'))->sum('score');
    }

    public function mount(){
        if (!empty(Session::get('quiz_id'))){
            $this->step = 2;
            $tmp_questions = QuizQuestion::where('quiz_id',Session::get('quiz_id'))->orderBy('id','asc')->get();
            if($tmp_questions->count() > 0){
                foreach($tmp_questions as $item){
                    $this->questions[] = [
                        'text' => $item->question->text,
                        'score' => !isset($item->score) ?  0:$item->score,
                        'id_row' => $item->id
                    ];
                }
            }
          $this->setScore();
        }   
    }

    public function render()
    {
        $params = [];
        if($this->step == 1){
            //todo check if has questions...
            $params['subject_options'] = Subject::select('subjects.id','subjects.name')->join('questions','questions.subject_id','subjects.id')->groupBy('subjects.id','subjects.name')->orderBy('name','asc')->get()->toArray();
        }
        return view('livewire.quiz.quiz-create',$params);
    }

    public function step1(){
        $this->validate();
        //todo create the quiz and save into session
        if(empty(Session::get('quiz_id'))){
            $quiz = new Quiz();
            $quiz->subject_id = $this->subject_id;
            $quiz->n_questions = $this->n_questions;
            $quiz->save();
            $this->step = 2;
            //generate the first question
            $tmp = Question::select('id','text')->where('subject_id',$this->subject_id)->inRandomOrder()->limit($this->n_questions)->get();
            if($tmp->count() > 0){   
                foreach($tmp as $item){
                    $quiz_question = new QuizQuestion();
                    $quiz_question->quiz_id = $quiz->id;
                    $quiz_question->question_id = $item->id;
                    $quiz_question->save();
                    $this->questions[] = $quiz_question;
                    
                }
                Session::put('quiz_id',$quiz->id);
            }
            $this->mount();
        }         
    }

    public function saveScore(){
        if(!empty($this->questions)){
            foreach($this->questions as $item){
                QuizQuestion::where('id',$item['id_row'])->update(['score'=>$item['score']]);
            }
            $this->setScore();
        }
    }

    public function terminateQuiz(){
        Session::forget('quiz_id');
        return back();
    }
  
} 
