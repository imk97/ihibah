<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Styles --}}
    <link rel="shortcut icon" href="{{ asset('favicon1.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/b-1.6.2/b-print-1.6.2/datatables.min.css"/>
    
    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/b-1.6.2/b-print-1.6.2/rg-1.1.2/datatables.min.js"></script>
    <script src="{{ asset('datatables/js/dataTables.rowsGroup.js') }}" type="text/javascript"></script>

</head>

@auth
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary" id="pb-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/image/mpk.png" alt="Logo" width="6%" />
                    &nbsp I-DIVIDEN
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarDropdown">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#plus">Tambah Data</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('excel') }}">Excel</a>
                            <a class="dropdown-item" href="{{ route('pdf') }}" data-toggle="modal" data-target="#pdf">Pdf</a>
                        </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            {{-- <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">Tukar Kata Laluan</a>
                            </div> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" target="_blank"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="pb_rounded-4 px-4"><i class="fas fa-sign-out-alt"></i></span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->
        <main class="py-5">
            @yield('content')
        </main>
    </body>
@endauth

@guest
    <body class="bg-primary">
        <main class="py-5 content">
            @yield('content')
            @extends('layouts.footer')
        </main>
    </body>
@endguest

</html>