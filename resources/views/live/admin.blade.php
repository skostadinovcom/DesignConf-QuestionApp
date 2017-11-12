@extends('layouts.app')

@section('page_title', 'Управление на "Стена на живо"')
@section('prev_link', '')
@section('prev_title', 'Начало')

@section('content')
    <section id="admin">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Администраторски панел: Стена на живо</div>
                <div class="panel-body">
                    <h1 class="page_title left">Управление на "Стена на живо"</h1>
                    <a href="javascript:void(0);" id="sponsor-live-btn" class="btn waves-effect right @if( intval($settings->value) == 2 ) live @endif">Показване на спонсори</a>
                    <a href="javascript:void(0);" id="cta-live-btn" class="btn waves-effect right @if( intval($settings->value) == 3 ) live @endif" style="margin-right: 15px;">Показване на CTA</a>
                    <div class="clear"></div>
                    <div class="alert alert-info refresh-info" style="display: none;">
                        Презаредете страницата за да проверите за нови въпрси. <a href="{{ url('/admin/live') }}">презареждане</a>
                    </div>
                </div>
                @if( isset($questions) && isset($questions[0]) )
                    <div class="table-area">
                        <table class="table table-striped">
                            <tr>
                                <th style="padding: 8px 18px;">От</th>
                                <th>Въпрос</th>
                                <th>Време</th>
                                <th>Опции</th>
                            </tr>
                            @foreach( $questions as $question )
                                <tr class="question-project @if( $question->live == 1 ) live @endif" data-id="{{ $question->id }}">
                                    <td style="padding: 8px 18px;">{{ $question->names }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ date('d M Y в H:i', $question->created_at->timestamp) }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="question-live" style="margin-right: 15px;">Пусни на стената</a>
                                        <a href="#" class="btn-delete question-delete">Изтрий</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="alert alert-info">Няма въпроси</div>
                    </div>
                    <div class="clear"></div>
                @endif
            </div>
        </div>
    </section>
@endsection