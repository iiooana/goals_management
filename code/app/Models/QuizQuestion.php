<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Quiz;
use App\Models\Question;

class QuizQuestion extends Model
{
    public function quiz() :HasOne {
        return $this->hasOne(Quiz::class);
    }

    public function question() : HasOne {
        return $this->hasOne(Question::class);
    }
}
