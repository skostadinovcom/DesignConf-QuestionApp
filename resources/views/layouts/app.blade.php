<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title') - Design Conf Guide</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/materialize/css/materialize.min.css') }}"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/styles/main.css') }}">

    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>tinymce.init({ selector:'textarea.editor' });</script>
</head>
<body>
    <header id="main-header">
        <div class="container">
            <div class="row">
                <div class="logo col-xs-6">
                    <a href="{{ url('/') }}" title="Design Conf">
                        <img src="{{ asset('assets/img/logo-conf.svg') }}">
                    </a>
                </div>
                <div class="questions col-xs-6">
                    <i class="fa fa-question" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </header>
    <section id="main-content">
        <div class="container">
            <div class="row">
                @if (Session::has('message'))
                    <div class="col-md-12">
                        <div class="alert alert-{{ Session::get('message')['type'] }}">
                            <ul>
                                <li>{!! Session::get('message')['msg'] !!}</li>
                            </ul>
                        </div>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </section>
    <footer id="main-footer">
        <div class="container">
            <div class="row">
                <a href="www.skostadinov.eu">Development: Stoyan Kostadinov</a>
                <p>Copyright &copy; Design Weekend {{ date('Y') }}</p>
            </div>
        </div>
    </footer>
    @if( Auth::check() )
    <section id="logged">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 name">
                    Здравей, {{ Auth::user()->name }}
                </div>
                <div class="col-xs-4 control">
                    <!-- Dropdown Trigger -->
                    <a class="dropdown-button" href="#" data-activates="admin-control-dd">
                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                    </a>

                    <!-- Dropdown Structure -->
                    <ul id="admin-control-dd" class="dropdown-content">
                        <li><a href="{{ url('/') }}">Начало</a></li>
                        <li><a href="{{ url('admin/news') }}">Управление на новини</a></li>
                        <li><a href="{{ url('admin/speakers') }}">Управление на лектори</a></li>
                        <li><a href="{{ url('admin/live') }}">Управление на прожекционен екран</a></li>
                        <hr/>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Изход</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section id="questions">
        <i class="fa fa-times" aria-hidden="true"></i>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page_title" style="margin-top: 10px;">Задай въпрос</h1>
                        <div class="alert_box"></div>
                        <form id="questions_form" style="margin-top: 40px;">
                            <div class="input-field">
                                <input type="text" class="names validate" placeholder="Иван Иванов">
                                <label for="first_name">Име</label>
                            </div>
                            <div class="input-field">
                                <textarea class="question_data materialize-textarea" placeholder="Здравейте, може ли да ви попитам...?"></textarea>
                                <label for="first_name">Въпрос</label>
                            </div>
                            <button class="btn">Изпрати въпроса</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- SCRIPTS -->
<script src="{{ asset('/assets/js/jquery-3.2.1.min.js')  }}"></script>
<script src="{{ asset('/bootstrap/js/bootstrap.min.js')  }}"></script>
<script src="{{ asset('/materialize/js/materialize.min.js') }}"></script>
<script src="{{ asset('/assets/js/app.js')  }}"></script>
</body>
</html>