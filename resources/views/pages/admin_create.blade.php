@extends('layouts.app')

@section('page_title', 'Добавяне на страница')
@section('prev_link', 'admin/pages')
@section('prev_title', 'Списък със страници')

@section('content')
    <section id="news">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Администраторски панел: Страници</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('admin/page/') }}">
                        {{ csrf_field() }}
                        <h1 class="page_title">Добавяне на страница</h1>
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
                            <input placeholder="Пример: Програма" id="post_title" type="text" class="validate" name="title">
                            <label for="post_title">Заглавието на страницата:</label>
                        </div>
                        <div class="input-field" style="margin-top: 25px;">
                            <span style="font-size: 10px;">Линка на страницата ще бъде /page/текста от полето</span>
                            <input placeholder="Пример: shedudle" id="post_url" type="text" class="validate" name="url">
                            <label for="post_url">Линк на страницата:</label>
                        </div>
                        <div class="input-field" style="margin-top: 25px;">
                            <span style="font-size: 10px;">Полето чете и HTML</span>
                            <textarea id="post_content" class="materialize-textarea editor" placeholder="1. Откриване" name="desc"></textarea>
                            <label for="post_content">Съдържание на страницата:</label>
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