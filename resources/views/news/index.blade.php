@extends('layouts.app')

@section('page_title', 'Новини')

@section('content')
    <section id="news">
        @if( Auth::check() )
            <div class="col-md-12">
                <div class="alert alert-info">За да редактирате публикация първо влезте в нея. <br/><br/> <a href="{{ url( 'news/create' ) }}">Добави нова публикация</a> </div>
            </div>
        @endif
        @forelse ($news as $post)
            <article class="news col-md-3 col-sm-6 col-xs-12">
                <a href="{{ url( '/news/' . $post->id ) }}" class="title">{{ $post->title }}</a>
                <span class="info">Публикувана в {{ date('H:i', $post->created_at->timestamp) }} на {{ date('d.m.Y', $post->created_at->timestamp) }}</span>
                <p>
                    {{ str_limit(strip_tags($post->content), $limit = 100, $end = '...') }} <a href="{{ url( '/news/' . $post->id ) }}">прочети повече...</a>
                </p>
                @if( $post->public == 0 )<p class="red">Новината не е публикувана</p>@endif
            </article>
        @empty
            <div class="col-md-12">
                <div class="alert alert-info">Няма новини</div>
            </div>
        @endforelse
    </section>
@endsection