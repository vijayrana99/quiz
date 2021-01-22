<?php

namespace App\Http\Controllers\Backend;

use App\Option;
use App\Question;
use App\UserQuestionAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    public function index()
    {
        $questionAnswers = UserQuestionAnswer::with('questions.options')
                                    ->paginate(15);
                                        

        $data = [];

        // foreach($questionAnswers as $key => $uqa) {
        //     $questions = Question::where('id', $uqa->questions->id)->first();
        //     $data[$key]['question'] = $questions->question;        
            
        //     foreach($uqa->questions->options as $qtn) {
        //         $options = Option::where('question_id', $questions->id)->get();
        //         foreach($options as $option) {
        //             if ($option->is_right_option == 1) {
        //                 $data[$key]['right_options'] = $option->option;
        //             }
        //         }
        //     }
        // }        

        foreach($questionAnswers as $questions) {
            // dd($questions->questions);
            // $userAnswer = Option::where('id', $questions->option_id)
            //                         ->where('question_id', $questions->question_id)
            //                         ->get();

            // foreach($userAnswer as $answer) {
            //     $userQuestionAnswers['user_option'] = $userAnswer->option;
            //     $userQuestionAnswers['is_right_option'] = $userAnswer->is_right_option;

            // }
        }

        // dd($questionAnswers);

        return view('backend.index', ['questionAnswers' => $questionAnswers]);
    }
}
