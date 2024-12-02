<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Question;

class Subject extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    public function questions(): HasMany {
        return $this->hasMany(Question::class);
    }
}
