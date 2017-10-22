@extends('layouts.app')

@section('page_title', 'Лектори')

@section('content')
    <section id="news">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Администраторски панел: Лектори</div>
                <div class="panel-body">
                    <h1 class="page_title left">Списък с лектори</h1>
                    <a href="{{ url('admin/speaker/create') }}" class="btn waves-effect right">Добави нов лектор</a>
                </div>

                @if( isset($speakers) && isset($speakers[0]) )
                <div class="table-area">
                    <table class="table table-striped">
                        <tr>
                            <th style="padding: 8px 18px;">Име</th>
                            <th>Статус</th>
                            <th>Опции</th>
                        </tr>
                        @foreach( $speakers as $speaker )
                        <tr>
                            <td style="padding: 8px 18px;">
                                <img src="{{ asset( 'uploads/speakers/' . $speaker->image ) }}" width="20" height="20" style="margin-right: 5px; margin-top: -3px;">
                                {{ $speaker->names }}
                            </td>
                            <td>
                                @if( $speaker->public == 1 )
                                    Публикуван
                                @else
                                    Чернова
                                @endif
                            </td>
                            <td>
                                <a href="{{ url( 'admin/speaker/' . $speaker->id ) }}" style="margin-right: 15px;">Редактиране</a>
                                <form method="POST" class="delete-form" action="{{ url( 'admin/speaker/' . $speaker->id) }}">
                                    {{ csrf_field()  }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn-delete">Изтрий този лектор</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                    <div class="col-md-12">
                        <div class="alert alert-info">Няма лектори</div>
                    </div>
                    <div class="clear"></div>
                @endif
            </div>
        </div>
    </section>
@endsection