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
        $news = News::where('public', 1)->orderBy('id', 'DESC')->get();
        return view('news.index', ['news' => $news]);
    }

    /**
     * Display a listing of the resource on admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        $news = News::orderBy('id', 'DESC')->where('public', '!=', '2')->get();
        return view('news.admin_index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.admin_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect( url('admin/news/') )->with( 'message', ['type' => 'success', 'msg' => 'Успешно добавихте публикацията' ] );
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
        return view('news.admin_edit', ['post' => $post]);
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

        return redirect( url('admin/news/' . $id . '/' ) )->with( 'message', ['type' => 'success', 'msg' => 'Вие успешно редактирахте публикацията' ] );
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
            return redirect(url('admin/news'))->with( 'message', ['type' => 'success', 'msg' => 'Успешно изтрихте новината.'] );
        }
    }
}
