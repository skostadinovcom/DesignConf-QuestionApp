@extends('layouts.app')

@section('page_title', $post->title)

@section('content')
    <section id="news">
        <article class="news col-md-3 col-sm-6 col-xs-12">
            @if( $post->public == 0 )<p class="red">Новината не е публикувана</p>@endif
            <h1 class="title">{{ $post->title }}</h1>
            <span class="info">Публикувана в {{ date('H:i', $post->created_at->timestamp) }} на {{ date('d.m.Y', $post->created_at->timestamp) }}</span>
            {!! $post->content !!}
            @if( Auth::check() )
            <p>
                <form method="POST" action="{{ url( 'news/' . $post->id) }}">
                    {{ csrf_field()  }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="red btn">Изтрий публикацията</button>
                </form>
                <a class="btn" href="{{ url( 'news/' . $post->id . '/edit' ) }}">Редактирай публикацията</a>
            </p>
            @endif
        </article>
    </section>
@endsection