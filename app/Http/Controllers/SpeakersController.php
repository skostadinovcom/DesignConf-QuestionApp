<?php

namespace App\Http\Controllers;

use App\Http\Models\Speakers;
use Illuminate\Http\Request;
use Auth;
use Image;

class SpeakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speakers::where('public', 1)->orderBy('id', 'DESC')->get();

        return view('speakers.index', ['speakers' => $speakers]);
    }

    /**
     * Display a listing of the resource on admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        $speakers = Speakers::orderBy('id', 'DESC')->get();

        return view('speakers.admin_index', ['speakers' => $speakers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('speakers.admin_create');
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
            'names' => 'required',
            'picture' => 'required',
            'profession' => 'required',
            'status' => 'required',
        ],[
            'names.required' => 'Моля въведете име на лектора.',
            'picture.required' => 'Моля качете снимка на лектора.',
            'profession.required' => 'Моля въведете професия или фирма на лектора',
        ]);

        $request->social = json_encode($request->social);

        if ( $request->hasFile('picture') ){
            $picture = $request->file('picture');
            $filename = time() . rand(0,999) . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(500,500)->save( public_path('uploads/speakers/' . $filename) );
        }

        $speaker = new Speakers;
        $speaker->names = $request->names;
        $speaker->profession = $request->profession;
        $speaker->image = $filename;
        $speaker->bio = $request->bio;
        $speaker->social = $request->social;
        $speaker->public = $request->status;
        $speaker->save();

        return redirect( url('admin/speakers/') )->with( 'message', ['type' => 'success', 'msg' => 'Успешно добавихте лектора' ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $speaker = Speakers::where('id', $id)->first();
        $speaker_social = json_decode($speaker->social);
        return view('speakers.show', ['speaker' => $speaker, 'speaker_social' => $speaker_social]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speaker = Speakers::where('id', $id)->first();
        $speaker_social = json_decode($speaker->social);
        return view('speakers.admin_edit', ['speaker' => $speaker, 'speaker_social' => $speaker_social]);
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
            'names' => 'required',
            'profession' => 'required',
            'status' => 'required',
        ],[
            'names.required' => 'Моля въведете име на лектора.',
            'profession.required' => 'Моля въведете професия или фирма на лектора',
        ]);

        $request->social = json_encode($request->social);

        $speaker = Speakers::find($id);
        $speaker->names = $request->names;
        $speaker->profession = $request->profession;
        $speaker->bio = $request->bio;
        if ( $request->hasFile('picture') ){
            $picture = $request->file('picture');
            $filename = time() . rand(0,999) . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(500,500)->save( public_path('uploads/speakers/' . $filename) );
            $speaker->image = $filename;
        }
        $speaker->social = $request->social;
        $speaker->public = $request->status;
        $speaker->save();

        return redirect( url('admin/speaker/' . $id . '/' ) )->with( 'message', ['type' => 'success', 'msg' => 'Вие успешно редактирахте лектора' ] );
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
            Speakers::destroy($id);
            return redirect(url('admin/speakers'))->with( 'message', ['type' => 'success', 'msg' => 'Успешно изтрихте лектора.'] );
        }
    }
}
