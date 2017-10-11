<?php

namespace App\Http\Controllers;

use App\Http\Models\News;
use Illuminate\Http\Request;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::check() ){
            $news = News::get();
        }else{
            $news = News::where('public', 1)->get();
        }

        return view('news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( !Auth::check() ){
            return redirect('/')->with( 'message', ['type' => 'danger', 'msg' => 'Вие нямате права.'] );
            exit();
        }

        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( !Auth::check() ){
            return redirect('/')->with( 'message', ['type' => 'danger', 'msg' => 'Вие нямате права.'] );
            exit();
        }

        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'status' => 'required',
        ],[
            'title.required' => 'Моля въведете заглавие.',
            'desc.required' => 'Моля въведете съдържание на публикацията.',
        ]);

        $post = new News;
        $post->title = $request->title;
        $post->content = $request->desc;
        $post->author = Auth::id();
        $post->public = $request->status;
        $post->save();

        return redirect( url('news/') )->with( 'message', ['type' => 'success', 'msg' => 'Успешно добавихте публикацията' ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = News::where('id', $id)->first();

        return view('news.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = News::where('id', $id)->first();

        return view('news.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ( !Auth::check() ){
            return redirect('/')->with( 'message', ['type' => 'danger', 'msg' => 'Вие нямате права.'] );
            exit();
        }

        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'status' => 'required',
        ],[
            'title.required' => 'Моля въведете заглавие.',
            'desc.required' => 'Моля въведете съдържание на публикацията.',
        ]);

        $post = News::find($id);

        $post->title = $request->title;
        $post->content = $request->desc;
        $post->public = $request->status;
        $post->save();

        return redirect( url('news/' . $id . '/edit' ) )->with( 'message', ['type' => 'success', 'msg' => 'Вие успешно редактирахте публикацията' ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( Auth::check() ){
            News::destroy($id);

            return redirect(url('news'))->with( 'message', ['type' => 'success', 'msg' => 'Успешно изтрихте новината.'] );
        }
    }
}
