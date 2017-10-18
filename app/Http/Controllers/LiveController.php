<?php

namespace App\Http\Controllers;

use App\Http\Models\Questions;
use App\Http\Models\Settings;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Auth;

class LiveController extends Controller
{
    /**
     * Live page
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $ajax = null )
    {
        if ( isset($ajax) && !empty($ajax) && $ajax == 'ajax' ){
            $question = Questions::where('live', 1)->first();
            $screen = Settings::where('setting', 'live_screen')->first();
            return view('live.updater', ['screen' => $screen, 'question' => $question]);
        }else{
            return view('live.index');
        }
    }

    /**
     * Store the question data
     *
     * @return \Illuminate\Http\Response
     */
    public function store_question(Request $request)
    {
        $request->validate([
            'names' => 'required',
            'question' => 'required',
        ]);

        $question = new Questions;
        $question->names = $request->names;
        $question->question = $request->question;
        $question->live = 0;
        $question->save();
    }

    /**
     * Store the question data
     *
     * @return \Illuminate\Http\Response
     */
    public function live()
    {
        if ( !Auth::check() ){
            return redirect('/')->with( 'message', ['type' => 'danger', 'msg' => 'Вие нямате права.'] );
            exit();
        }

        $questions = Questions::orderBy('id', 'desc')->get();
        $settings = Settings::where('setting', 'live_screen')->first();

        return view('live.admin_news', ['questions' => $questions, 'settings' => $settings]);
    }

    public function live_manage(Request $request)
    {
        if ( !Auth::check() ){
            die();
        }

        if ( $request->type == 'question' ){
            Settings::where('setting', 'live_screen')->update(['value' => 1]);

            Questions::where('live', 1)->update(['live' => 0]);

            $question = Questions::find($request->id);
            $question->live = 1;
            $question->save();
        }elseif ( $request->type == 'sponsors' ){
            Settings::where('setting', 'live_screen')->update(['value' => 2]);
            Questions::where('live', 1)->update(['live' => 0]);
        }elseif ( $request->type == 'cta' ){
            Settings::where('setting', 'live_screen')->update(['value' => 3]);
            Questions::where('live', 1)->update(['live' => 0]);
        }elseif ( $request->type == 'question-delete' ){
            Questions::destroy($request->id);
        }
    }
}
