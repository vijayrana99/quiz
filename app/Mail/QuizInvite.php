<?php

namespace App\Mail;

use App\Quiz;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuizInvite extends Mailable
{
    use Queueable, SerializesModels;

    public $quiz, $token;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Quiz $quiz, $token)
    {
        $this->quiz = $quiz;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.quiz_invite');
    }
}
