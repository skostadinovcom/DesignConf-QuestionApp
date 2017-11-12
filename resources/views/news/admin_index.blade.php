@extends('layouts.app')

@section('page_title', 'Новини')
@section('prev_link', '')
@section('prev_title', 'Начало')

@section('content')
    <section id="news">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Администраторски панел: Новини</div>
                <div class="panel-body">
                    <h1 class="page_title left">Списък с новини</h1>
                    <a href="{{ url('admin/news/create') }}" class="btn waves-effect right">Добави нова публикация</a>
                </div>

                @if( isset($news) && isset($news[0]) )
                <div class="table-area">
                    <table class="table table-striped">
                        <tr>
                            <th style="padding: 8px 18px;">ID</th>
                            <th>Заглавие</th>
                            <th>Автор</th>
                            <th>Статус</th>
                            <th>Опции</th>
                        </tr>
                        @foreach( $news as $post )
                        <tr>
                            <td style="padding: 8px 18px;">{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->author_info->name }}</td>
                            <td>
                                @if( $post->public == 1 )
                                    Публикувана
                                @else
                                    Чернова
                                @endif
                            </td>
                            <td>
                                <a href="{{ url( 'admin/news/' . $post->id ) }}" style="margin-right: 15px;">Редактиране</a>
                                <form method="POST" class="delete-form" action="{{ url( 'admin/news/' . $post->id) }}">
                                    {{ csrf_field()  }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn-delete">Изтрий публикацията</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                    <div class="col-md-12">
                        <div class="alert alert-info">Няма новини</div>
                    </div>
                    <div class="clear"></div>
                @endif
            </div>
        </div>
    </section>
@endsection