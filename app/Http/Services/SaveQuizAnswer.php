<?php

namespace App\Http\Services;

use App\Option;
use App\UserQuestionAnswer;


class SaveQuizAnswer
{

    public function answer($email, $request) {
        
        $requestValues = $request->all();
        $userAnswer = new UserQuestionAnswer;
        $userAnswer->email = $email;
        $data = [];
        
        foreach($requestValues as $question_id => $answer) {
            if ($question_id == '_token') {
                break;
            }

            //dd(is_numeric($answer));
            //for checkboxes
            if (is_array($answer)) {
                $right_answer = Option::where('question_id', $question_id)
                                        ->where('is_right_option', 1)->pluck('id')->toArray();
                

                if (empty(array_diff($right_answer,$answer))) {
                    $is_right = 1;
                } else {
                    $is_right = 0;
                }

                foreach($answer as $q_id => $ans) {

                    $data[] =[
                        'email' => $email,
                        'question_id' => (int) $question_id,
                        'option_id' => $ans,
                        'is_right' => $is_right
                    ];
                }
            } else if (is_numeric($answer)) {
                //for radio buttons
                $right_answer = Option::where('question_id', $question_id)
                                        ->where('is_right_option', 1)->first();

                if ($right_answer->id == $answer) {
                     $is_right = 1;
                } else {
                    $is_right = 0;
                }
                
                $data[] = [
                    'email' => $email,
                    'question_id' => (int)$question_id,
                    'option_id' => (int)$answer,
                    'is_right' => $is_right
                ];
            } else {
                $data[] = [
                    'email' => $email,
                    'question_id' => (int)$question_id,
                    'option_id' => 0,
                    'is_right' => 0
                ];
            }
        }

        $isSaved = UserQuestionAnswer::insert($data);

        return $isSaved;

    }

}