@extends('layouts.app')

@section('page_title', 'Начало')

@section('content')
<!-- INDEX -->
<section id="index">
    <div class="index-btn col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url('/news') }}" class="overlay waves-effect" id="news">
            <h1>Новини</h1>
        </a>
    </div>
    <div class="index-btn col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url('/schedule') }}" class="overlay waves-effect" id="program">
            <h1>Програма</h1>
        </a>
    </div>
    <div class="index-btn col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url('/exhibitors') }}" class="overlay waves-effect" id="exhibitors">
            <h1>Ьзложители</h1>
        </a>
    </div>
    <div class="index-btn col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url('speakers') }}" class="overlay waves-effect" id="lectours">
            <h1>Лектори</h1>
        </a>
    </div>
</section>
@endsection