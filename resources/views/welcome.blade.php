<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIM SURAT</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {!! Html::style('css/custom.css') !!}
    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
        color: white;

    }

    .links {
        padding: 0px;
    }

    .links li {
        list-style: none;
        display: inline;
    }

    .links li a {
        background: #00924A;
        color: #fff;
        padding: 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        color: white;
        
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth

            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

        @else
        <a href="{{ route('login') }}">Login</a>
        @endauth
    </div>
    @endif

    <div class="content">
        <div class="title">
            <img src="{{ asset('logo.png') }}" width="150" alt="">
        </div>

        <p>Pengadilan Negeri Gorontalo</p>


        <div class="links">
            <li><a href="{{ route('surat.index') }}">Daftar Surat Masuk/Keluar</a></li>
            <li><a href="{{ route('surat.create') }}">Buat Surat Masuk/Keluar</a></li>
            <li><a href="{{ route('disposisi.index') }}">Daftar Disposisi</a></li>
            <li><a href="{{ route('disposisi.create') }}">Buat Disposisi</a></li>
            <li><a href="{{ url('/surat/laporan') }}">Laporan Surat Masuk/Keluar</a></li>
        </div>
    </div>
</div>
</body>
</html>
