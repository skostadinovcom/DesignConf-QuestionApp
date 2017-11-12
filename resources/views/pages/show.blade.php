@extends('layouts.app')

@section('page_title', $page->title)
@section('prev_link', '')
@section('prev_title', 'Начало')

@section('content')
    <section id="news">
        <article class="news col-md-3 col-sm-6 col-xs-12">
            <h1 class="title" style="margin-bottom: 15px;">{{ $page->title }}</h1>
            {!! $page->content !!}
        </article>
    </section>
@endsection