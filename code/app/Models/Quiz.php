<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Subject;
use App\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use SoftDeletes;

    public function subject(): HasOne {
        return $this->hasOne(Subject::class);
    }

    public function rows(): HasMany {
        return $this->hasMany(QuizQuestion::class,'quiz_id');
    } 
    public function mark(){
        if($this->rows()->count() > 0){
            return round(($this->rows()->sum('score')*100)/$this->rows()->count(),2);
        }
        return 0;
    }
}
