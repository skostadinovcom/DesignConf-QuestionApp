@extends('layouts.app')

@section('page_title', 'Добавяне на новина')

@section('content')
    <section id="news">
        <form method="POST" action="{{ url('/news') }}">
            {{ csrf_field() }}
            <div class="col-md-12">
                <h1 class="page_title">Добавяне на новина</h1>
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
                    <input placeholder="Пример: Хора от Севлиево организират Design Conf за първи път..." id="post_title" type="text" class="validate" name="title">
                    <label for="post_title">Заглавието на публикацията:</label>
                </div>
                <div class="input-field" style="margin-top: 25px;">
                    <span style="font-size: 10px;">Полето чете и HTML</span>
                    <textarea id="post_content" class="materialize-textarea" placeholder="Пример: Хора от Севлиево организират Design Conf за първи път..." name="desc"></textarea>
                    <label for="post_content">Съдържание на публикацията:</label>
                </div>
                <div>
                    <label>Статус:</label>
                    <select class="browser-default" name="status">
                        <option value="1" selected>Публикувана</option>
                        <option value="0">Чернова</option>
                    </select>
                </div>
                <div style="margin-top: 25px;">
                    <button type="submit" class="btn" style="width: 100%;">Запази</button>
                </div>
            </div>
        </form>
    </section>
@endsection