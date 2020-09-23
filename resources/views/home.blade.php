@extends('layouts.app')

@section('content')
@extends('modalpdf')
<div class="container">
    @if (Session::has('status'))
        <div class="alert alert-success text-center">
            {{ Session::get('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (Session::has('delete'))
        <div class="alert alert-danger text-center">
            {{ Session::get('delete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
    @else
    @endif
    <div class="row justify-content-center">
        <div class="col">
            <div class="table-responsive">
                <table class="table" id="dividens">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th colspan="2">Bank</th>
                            <th colspan="2">Baki</th>
                            <th colspan="5">Pelaburan</th>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <th>No Akaun/No Sijil</th>
                            <th>Tarikh</th>
                            <th>RM</th>
                            <th>Faedah</th>
                            <th>RM</th>
                            <th>Akaun Bil</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dividen)
                            <tr>
                                <td></td>
                                <td>{{ $dividen->bank }}</td>
                                <td>{{ $dividen->account }} </td>
                                <td>{{ $dividen->lastDura }}</td>
                                <td>{{ $dividen->valLastDura }}</td>
                                <td>{{ $dividen->interest }}</td>
                                <td>{{ $dividen->total }}</td>
                                <td>{{ $dividen->accBill }}</td>
                                <td>
                                    <a href="{{ route('index.id', ['id' => $dividen->id] ) }}"><i
                                            class="fa fa-edit"></i></a>&nbsp;
                                    <a style="color:red" onclick="myDelete({{ $dividen->id }})"><i
                                            class="fas fa-trash"></i></a>&nbsp;&nbsp;<a
                                        onclick="info({{ $dividen->id }})"><i class="fa fa-info-circle"></i></a>
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

<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center" >
            <h5><strong>Form</strong></h5>
            <h2>Maklumat IHibah</h2>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <form action="{{ route('add') }}" method="POST" id="plus">
                @csrf
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bank">Bank</label>
                            <select name="bank" id="bank" class="form-control">
                                <option value=""></option>
                                <option value="BANK RAKYAT">Bank rakyat</option>
                                <option value="BANK RAKYAT (KULAI)">Bank rakyat (Kulai)</option>
                                <option value="AMBANK">Ambank</option>
                                <option value="BIMB">Bimb</option>
                                <option value="BANK MUAMALAT">Bank muamalat</option>
                                <option value="MBSB">Mbsb </option>
                                <option value="BSN">Bsn</option>
                                <option value="PBB">Pbb</option>
                                <option value="CIMB">Cimb</option>
                                <option value="OCBC">Ocbc</option>
                                <option value="KUWAIT">Kuwait</option>
                                <option value="RHB">Rhb</option>
                                <option value="AFFIN">Affin</option>
                                <option value="MAYBANK">Maybank</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="account">No Akaun</label>
                            <input type="text" name="account" id="account" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="startDura">Tarikh Mula</label>
                            <input type="date" name="startDura" id="startDura" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="endDura">Tarikh Tamat</label>
                            <input type="date" name="endDura" id="endDura" class="form-control" oninput="date()">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="month">Tempoh Bulan</label>
                            <input name="month" id="month" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="interest">Kadar Faedah</label>
                            <input type="text" name="interest" id="interest" class="form-control" placeholder="999.99">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="total">Diterima (RM)</label>
                            <input type="text" name="total" id="total" class="form-control" placeholder="999999.99">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="valLastDura">Jumlah Baki (RM)</label>
                            <input type="text" name="valLastDura" id="valLastDura" class="form-control" placeholder="9999999.99">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="lastDura">Tarikh Baki </label>
                        <input type="date" name="lastDura" id="lastDura" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="accountBill">No. Akaun Bil</label>
                        <input type="text" name="accBill" id="accBill" class="form-control">
                    </div>
                </div><br>
                <div class="text-center">
                    <button type="submit">Hantar</button>
                    <button type="reset">Padam</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/cleave.js') }}"></script>

<script>
    var cleavetotal = new Cleave('#total', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    })

    var cleavevallastdura = new Cleave('#valLastDura', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    })
</script>

<script type="text/javascript">
    var app_url = {!! json_encode(url('/')) !!};
    console.log(app_url)

    $(document).ready(function(){

        var data = []
        var main = $('table tbody tr')
        var total = 0
        
        main.find('td:eq(4)').each(function(index, val) {
            var x = val.innerHTML.replace(/,/g, "")
            data.push(parseFloat(x))
        })

        for (let index = 0; index < data.length; index++) {
            total = total + data[index]
        }
        console.log(total)
    })

</script>

<script src="{{ asset('js/dividen.js') }}" type="text/javascript"></script>


{{-- <section class="pb_md_py_cover pb_white overflow-hidden pb_gradient_v1 cover-bg-opacity-6" id="dashboard"
    style="background-image: url(assets/images/1900x1200_img_5.jpg)">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 justify-content-center">
                <div class="card">
                    <div class="card-header text-center">
                        Carian
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('index') }}">
                            @php
                                session()->forget(['bank', 'acc', 'ref']);
                            @endphp
                            <div class="form-group row">
                                <label for="bank" class="col-sm-2">Bank :</label>
                                <div class="col-sm-10">
                                    <select name="bank" id="bank" class="form-control @error('bank') is-invalid @enderror">
                                        <option value=""></option>
                                        <option value="BANK RAKYAT">Bank rakyat</option>
                                        <option value="BANK RAKYAT (KULAI)">Bank rakyat (Kulai)</option>
                                        <option value="AMBANK">Ambank</option>
                                        <option value="BIMB">Bimb</option>
                                        <option value="BANK MUAMALAT">Bank muamalat</option>
                                        <option value="MBSB">Mbsb </option>
                                        <option value="BSN">Bsn</option>
                                        <option value="PBB">Pbb</option>
                                        <option value="CIMB">Cimb</option>
                                        <option value="OCBC">Ocbc</option>
                                        <option value="KUWAIT">Kuwait</option>
                                        <option value="RHB">Rhb</option>
                                        <option value="AFFIN">Affin</option>
                                        <option value="MAYBANK">Maybank</option>
                                    </select>
                                    @error('bank')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account" class="col-sm-2">No. Akaun :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="account" class="form-control @error('account') is-invalid @enderror" id="account">
                                    @error('account')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary btn-md">{{ __('Cari') }}</button>
                                <button type="reset" class="btn btn-secondary btn-md">{{ __('Padam') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END section -->
@endsection