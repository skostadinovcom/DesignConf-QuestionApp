@extends('layouts.app')

@section('page_title', $post->title)
@section('prev_link', 'news')
@section('prev_title', 'Новини')

@section('content')
    <section id="news">
        <article class="news col-md-3 col-sm-6 col-xs-12">
            <h1 class="title">{{ $post->title }}</h1>
            <span class="info">Публикувана в {{ date('H:i', $post->created_at->timestamp) }} на {{ date('d.m.Y', $post->created_at->timestamp) }}</span>
            {!! $post->content !!}
        </article>
    </section>
@endsection