@extends('layouts.app')

@section('page_title', 'Лектори')
@section('prev_link', '')
@section('prev_title', 'Начало')

@section('content')
    <section id="speakers">
        @forelse ($speakers as $speaker)
            <a href="{{ url( '/speaker/' . $speaker->id ) }}" class="speaker waves-effect col-sm-6 col-xs-12">
                <div class="content">
                    <div class="image">
                        <img src="{{ asset( 'uploads/speakers/' . $speaker->image ) }}">
                    </div>
                    <div class="info">
                        <h1>{{ $speaker->names }}</h1>
                        <div class="profession">{{ $speaker->profession }}</div>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-md-12">
                <div class="alert alert-info">Няма лектори</div>
            </div>
        @endforelse
    </section>
@endsection