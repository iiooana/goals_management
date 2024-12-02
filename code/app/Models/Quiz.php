<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Subject;

class Quiz extends Model
{
    use SoftDeletes;

    public function subject(): HasOne {
        return $this->hasOne(Subject::class);
    }
}
