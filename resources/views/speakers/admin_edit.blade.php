@extends('layouts.app')

@section('page_title', 'Редактиране на лектор: ' . $speaker->names )
@section('prev_link', 'admin/speakers')
@section('prev_title', 'Списък с лектори')

@section('content')
    <section id="news">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Администраторски панел: Лектори</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ url('admin/speaker/' . $speaker->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <h1 class="page_title">Редактиране на лектор: {{ $speaker->names }}</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger" style="margin: 20px 0;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="input-field" style="margin-top: 25px;">
                            <input placeholder="Иван Иванов" id="speaker_names" type="text" class="validate" name="names" value="{{ $speaker->names }}">
                            <label for="speaker_names">Име:</label>
                        </div>
                        @if( isset($speaker->image) )
                            <img src="{{ asset( 'uploads/speakers/' . $speaker->image ) }}" width="150" height="150">
                        @endif
                        <div class="file-field input-field">
                            <div class="btn waves-effect">
                                <span>Снимка:</span>
                                <input type="file" name="picture">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path" type="text" readonly>
                            </div>
                        </div>
                        <div class="input-field" style="margin-top: 25px;">
                            <span style="font-size: 10px;">Полето чете и HTML</span>
                            <textarea id="speaker_bio" class="materialize-textarea editor" placeholder="Пример: Иван Иванов е ..." name="bio">{{ $speaker->bio }}</textarea>
                            <label for="speaker_bio">Биография:</label>
                        </div>
                        <div class="input-field" style="margin-top: 25px;">
                            <input placeholder="Facebook" id="speaker_work" type="text" class="validate" name="profession" value="{{ $speaker->profession }}">
                            <label for="speaker_work">Професия / работа / фирма:</label>
                        </div>
                        <div class="input-field" style="margin-top: 25px;">
                            <input placeholder="Facebook" type="text" class="validate col-xs-3" name="social[fb]" value="{{ $speaker_social->fb }}">
                            <input placeholder="Twitter" type="text" class="validate col-xs-3" name="social[tw]" value="{{ $speaker_social->tw }}">
                            <input placeholder="LinkedIn" type="text" class="validate col-xs-3" name="social[li]" value="{{ $speaker_social->li }}">
                            <input placeholder="Website" type="text" class="validate col-xs-3" name="social[web]" value="{{ $speaker_social->web }}">
                            <label for="post_content">Социални мрежи:</label>
                        </div>
                        <div>
                            <label>Статус:</label>
                            <select class="browser-default" name="status">
                                <option value="1" @if( $speaker->public == 1 ) selected @endif>Публикувана</option>
                                <option value="0" @if( $speaker->public == 0 ) selected @endif>Чернова</option>
                            </select>
                        </div>
                        <div style="margin-top: 25px;">
                            <button type="submit" class="btn" style="width: 100%;">Запази</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection