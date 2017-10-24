@extends('layouts.app')

@section('page_title', 'Редактиране на новина: ' . $post->title )

@section('content')
    <section id="news">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Администраторски панел: Новини</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('admin/news/' . $post->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <h1 class="page_title">Редактиране на новина: {{ $post->title }}</h1>
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
                            <input placeholder="Пример: Хора от Севлиево организират Design Conf за първи път..." id="post_title" type="text" class="validate" name="title" value="{{ $post->title }}">
                            <label for="post_title">Заглавието на публикацията:</label>
                        </div>
                        <div class="input-field" style="margin-top: 25px;">
                            <span style="font-size: 10px;">Полето чете и HTML</span>
                            <textarea id="post_content" class="materialize-textarea editor" placeholder="Пример: Хора от Севлиево организират Design Conf за първи път..." name="desc">{!! $post->content !!}</textarea>
                            <label for="post_content">Съдържание на публикацията:</label>
                        </div>
                        <div>
                            <label>Статус:</label>
                            <select class="browser-default" name="status">
                                <option value="1" @if( $post->public == 1 ) selected @endif >Публикувана</option>
                                <option value="0" @if( $post->public == 0 ) selected @endif>Чернова</option>
                            </select>
                        </div>
                        <div style="margin-top: 25px;">
                            <button type="submit" class="btn" style="width: 100%;">Редактирай</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection