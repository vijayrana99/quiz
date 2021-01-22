<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
    protected $table = 'user_question_answer';

    public function questions() {
        return $this->belongsTo(Question::Class, 'question_id');
    }
    
}
