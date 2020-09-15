@extends('layouts.app')

@section('content')

<section class="pb_sm_py_cover overflow-hidden pb_gradient_v1 cover-bg-opacity-6" id="dashboard"
    style="background-image: url(assets/images/1900x1200_img_5.jpg)">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 justify-content-center">
                <div class="table-responsive">
                    @php
                        echo session('bank');
                        echo session('acc');
                    @endphp
                    <table id="dividens" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bank</th>
                                <th>No Akaun/No Sijil</th>
                                <th colspan="2">Baki Tarikh</th>
                                <th>Durasi Pelaburan</th>
                                <th>Faedah</th>
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
                                <td>{{ 'RM '. $dividen->valLastDura }}</td>
                                <td>{{ $dividen->startDura. ' - ' .$dividen->endDura}}</td>
                                <td>{{ $dividen->interest. ' RM '. $dividen->total}}</td>
                                <td>{{ $dividen->accBill }}</td>
                                {{-- <td>{{ 'RM '.$dividen->total }}</td> --}}
                                <td>
                                    <a href="{{ route('index.id', ['id' => $dividen->id] ) }}"><i
                                            class="fa fa-edit"></i></a>&nbsp;
                                    <a style="color:red" onclick="myDelete({{ $dividen->id }})"><i
                                            class="fa fa-trash-o"></i></a>&nbsp;&nbsp;<a
                                        onclick="info({{ $dividen->id }})"><i class="fa fa-info-circle"></i></a>
                                    <form action="" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    {{-- <a
                                        href="{{ route('pdf.id', [ 'id' => $dividen->id ]) }}"><i
                                        class="fas fa-file-pdf"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END section -->

<section class="pb_section bg-white pb_pb-250" id="plus">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 text-center mb-5">
                <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2">
                    <strong>Form</strong></h5>
                <h2>Maklumat Dividen</h2>
            </div>
        </div>
        <div class="row">
            @if ($errors->any())
            <div class="container-fluid">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <form method="POST" action="{{ route('add') }}">
                @csrf
                <div class="container">
                    <div class="form-row">
                        <div class="col-sm-2">
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
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="account">No Akaun</label>
                                <input type="text" name="account" id="account" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="startDura">Tarikh Mula</label>
                                <input type="date" name="startDura" id="startDura" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="endDura">Tarikh Tamat</label>
                                <input type="date" name="endDura" id="endDura" class="form-control" oninput="date()">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="month">Tempoh Bulan</label>
                                <input name="month" id="month" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="interest">Kadar Faedah</label>
                                <input type="text" name="interest" id="interest" class="form-control"
                                    pattern="^(\d{1,2}\.\d{1,2})$">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="total">Diterima (RM)</label>
                                <input type="text" name="total" id="total" class="form-control" onblur="totalcommas()">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="valLastDura">Jumlah Baki (RM)</label>
                                <input type="text" name="valLastDura" id="valLastDura" class="form-control" onblur="valLastDurationcommas()">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="lastDura">Tarikh Baki </label>
                                <input type="date" name="lastDura" id="lastDura" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="accountBill">No. Akaun Bil</label>
                                <input type="text" name="accBill" id="accBill" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue">{{ __('Hantar') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
<!-- END section -->

<script type="text/javascript">
    var app_url = {!! json_encode(url('/')) !!};
    console.log(app_url)

    $(document).ready(function(){
        $('table tbody tr').find('td:eq(4)').each(function (index, val) {
            console.log(val.innerHTML)
        })
    })

</script>

<script src="{{ asset('js/dividen.js') }}" type="text/javascript"></script>

@endsection