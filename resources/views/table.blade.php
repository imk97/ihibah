@extends('layouts.app')

@section('content')
@extends('layouts.nav')
<div id="layoutSidenav" class="bg-light">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">
                        <img src="/image/mpk.png" class="mx-auto d-block" alt="Logo" width="70%"/>
                    </div>
                    <a style="color:black" class="nav-link" href="{{ route('home') }}"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color:black"></i></div>Dashboard</a>
                    <div class="sb-sidenav-menu-heading" style="color:black">Menu</div>
                    <a style="color:black" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-columns" style="color:black"></i>
                        </div>
                        I-Dividen
                        <div class="sb-sidenav-collapse-arrow" style="color:black">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne">
                        <nav class="sb-sidenav-menu-nested" nav>
                            <div class="sb-nav-link-icon">
                                <a class="nav-link" href="{{ route('create') }}" style="color:black">
                                    <i class="fa fa-plus"></i>
                                    &nbsp &nbsp Form
                                </a>
                            </div>
                            <div class="sb-nav-link-icon">
                                <a class="nav-link" href="{{ route('index') }}" style="color:black">
                                    <i class="fa fa-list"></i>
                                    &nbsp &nbsp Table
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                {{-- <h1>Dashboard</h1> --}}
                <div class="card mb-4">
                    <div class="card-header">DataTable</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%" cellspacing="0" class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>BANK</th>
                                        <th>NO AKAUN</th>
                                        <th>NO SIJIL</th>
                                        <th>TEMPOH</th>
                                        <th>DURASI PELABURAN</th>
                                        <th>FAEDAH %</th>
                                        <th>BAKI PADA</th>
                                        <th>FAEDAH DITERIMA</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dividen)
                                    <tr>
                                        <td>{{ $dividen->bank }}</td>
                                        <td>{{ $dividen->account }}</td>
                                        <td>{{ $dividen->reference }}</td>
                                        <td>{{ $dividen->month }}</td>
                                        <td>{{ $dividen->startIDura. ' - ' .$dividen->endDura }}</td>
                                        <td>{{ $dividen->interest }}</td>
                                        <td>{{ $dividen->lastDura }}</td>
                                        <td>{{ $dividen->total }}</td>
                                        <td>
                                            <a class="text-left" href="{{ route('index.id', ['id' => $dividen->id ]) }}"><i class="far fa-edit" ></i></a>
                                            <a class="text-right" onClick="myDelete({{ $dividen->id }})"><i class="far fa-trash-alt"></i></a>
                                            <form action="" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="{{ asset('js/action.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
@endsection