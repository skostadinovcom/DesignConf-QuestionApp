@extends('layouts.app')

@section('page_title', 'Страници')
@section('prev_link', '')
@section('prev_title', 'Начало')

@section('content')
    <section id="news">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Администраторски панел: Страници</div>
                <div class="panel-body">
                    <h1 class="page_title left">Списък със страници</h1>
                    <a href="{{ url('admin/page/create') }}" class="btn waves-effect right">Добави нова страница</a>
                </div>

                @if( isset($pages) && isset($pages[0]) )
                <div class="table-area">
                    <table class="table table-striped">
                        <tr>
                            <th style="padding: 8px 18px;">ID</th>
                            <th>Заглавие</th>
                            <th>Опции</th>
                        </tr>
                        @foreach( $pages as $page )
                        <tr>
                            <td style="padding: 8px 18px;">{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>
                                <a href="{{ url( 'admin/page/' . $page->id ) }}" style="margin-right: 15px;">Редактиране</a>
                                <form method="POST" class="delete-form" action="{{ url( 'admin/page/' . $page->id) }}">
                                    {{ csrf_field()  }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn-delete">Изтрий страницата</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                    <div class="col-md-12">
                        <div class="alert alert-info">Няма страници</div>
                    </div>
                    <div class="clear"></div>
                @endif
            </div>
        </div>
    </section>
@endsection