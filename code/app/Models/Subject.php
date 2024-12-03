<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Question;
use App\Models\Quiz;
class Subject extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    public function questions(): HasMany {
        return $this->hasMany(Question::class);
    }

    /**
     * Consider last 10 quizzes
     */
    public function avgScore(){
        if(Quiz::where('subject_id',$this->id)->count() > 0){
            $quizzes = Quiz::where('subject_id',$this->id)->orderBy('id','desc')->limit(10)->get();
            $score = 0;
            foreach($quizzes as $item){
                $score+=$item->mark();
            }
            return round($score/Quiz::where('subject_id',$this->id)->count(),2);
        }
        return 0;
    }
    public function lastScore(){
        if(Quiz::where('subject_id',$this->id)->count() > 0){
            $quiz = Quiz::where('subject_id',$this->id)->orderBy('id','desc')->first();
            return $quiz->mark();
        }
        return 0;
    }
}
