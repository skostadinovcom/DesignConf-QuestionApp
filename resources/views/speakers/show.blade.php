@extends('layouts.app')

@section('page_title', $speaker->names)
@section('prev_link', 'speakers')
@section('prev_title', 'Лектори')

@section('content')
    <section id="speakers">
        <article class="speaker-single col-md-3 col-sm-6 col-xs-12">
            @if( isset($speaker->image) )
                <img src="{{ asset( 'uploads/speakers/' . $speaker->image ) }}" width="100%">
            @endif
            <h1 class="title">{{ $speaker->names }}</h1>
            <span class="profession">{{ $speaker->profession }}</span>
            <span class="info">
                @if( isset( $speaker_social->fb ) )
                    <a href="{{ $speaker_social->fb }}" class="fa fa-facebook" target="_blank"></a>
                @endif
                @if( isset( $speaker_social->tw ) )
                    <a href="{{ $speaker_social->tw }}" class="fa fa-twitter" target="_blank"></a>
                @endif
                @if( isset( $speaker_social->li ) )
                    <a href="{{ $speaker_social->li }}" class="fa fa-linkedin" target="_blank"></a>
                @endif
                @if( isset( $speaker_social->web ) )
                    <a href="{{ $speaker_social->web }}" class="fa fa-globe" target="_blank"></a>
                @endif
            </span>
            {!! $speaker->bio !!}
        </article>
    </section>
@endsection