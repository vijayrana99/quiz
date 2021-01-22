<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizInvite extends Model
{

    protected $fillable = ['email', 'token'];
    
    protected $table = 'quiz_invites';
}
