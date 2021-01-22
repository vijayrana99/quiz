<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizInvite;
use Illuminate\Http\Request;
use App\Http\Services\SaveQuizAnswer;

class QuizController extends Controller
{

    public function __construct(
        Quiz $quiz,
        QuizInvite $quizInvite
    ){
        $this->quiz = $quiz;
        $this->quizInvite = $quizInvite;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accept($slug, $token)
    {
        
        $quiz = $this->quiz->with('questions.options')->where('slug', $slug)->firstOrFail();
        
        return view('frontend.quiz.index', ['quiz' => $quiz, 
                                            'token' => $token]);
    }

    public function answer(Request $request)
    {
        $invite = $this->quizInvite->where('token', $request->token)->first();
        $email = $invite->email;

        $isAnswerSaved = (new SaveQuizAnswer)->answer($email, $request);
        if ($isAnswerSaved)
            return redirect()->route('home')->with('success', 'Test Completed.');
        else
            return redirect()->route('home')->with('error', 'Something went wrong.');
    }
    
}
