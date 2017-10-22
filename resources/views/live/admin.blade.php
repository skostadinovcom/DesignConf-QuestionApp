@extends('layouts.app')
@section('page_title', 'Управление на "Стена на живо"')

@section('content')
    <section id="admin">
        <div class="screen-buttons">
            <a href="javascript:void(0);" id="sponsor-live-btn" class="waves-effect col-xs-6 @if( intval($settings->value) == 2 ) live @endif">Спонсори</a>
            <a href="javascript:void(0)" id="cta-live-btn" class="waves-effect col-xs-6 @if( intval($settings->value) == 3 ) live @endif">CTA</a>
        </div>
        <div class="questions">
        @forelse ($questions as $question)
            <article class="question question-project waves-effect @if( $question->live == 1 ) live @endif" data-id="{{ $question->id }}">
                <div class="info-line">
                    <h1 class="name">{{ $question->names }}</h1>
                    <div class="arrow">
                        <i class="fa fa-level-down" aria-hidden="true"></i>
                    </div>
                    <div class="clear"></div>
                </div>
                <p>
                    {{ $question->question }}
                    <br/>
                    Зададен: {{ date('d m Y - H:i', $question->created_at->timestamp) }}
                </p>
                <div class="clear"></div>
            </article>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-info">Няма въпроси</div>
                </div>
            @endforelse
        </div>
    </section>
@endsection