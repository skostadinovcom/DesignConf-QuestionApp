<?php

namespace App\Http\Controllers;

use App\Http\Models\Questions;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Store the question data
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'names' => 'required',
            'question' => 'required',
        ]);

        $question = new Questions;
        $question->names = $request->names;
        $question->question = $request->question;
        $question->accepted = 0;
        $question->live = 0;
        $question->save();
    }
}
