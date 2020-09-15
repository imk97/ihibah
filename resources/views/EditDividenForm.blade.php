@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row align-items-center justify-content-center">

            <div class="col-md-10 relative">
                <h2 class="mb-4 mt-0 text-center">Maklumat Dividen</h2>
                <form action="{{ route('update.id', ['id' => $data->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="bank">Nama Bank : </label>
                            <select id="bank" class="form-control pb_height-50 reverse @error('bank') is-invalid @enderror" required name="bank" value="{{ $data->bank }}">
                                <option></option>
                                <option value="BANK RAKYAT" @if($data->bank == 'BANK RAKYAT') selected @endif>BANK RAKYAT</option>
                                <option value="BANK RAKYAT (KULAI)" @if($data->bank == 'BANK RAKYAT (KULAI)') selected @endif>BANK RAKYAT (KULAI)</option>
                                <option value="AMBANK" @if($data->bank == 'AMBANK') selected @endif>AMBANK</option>
                                <option value="BIMB" @if($data->bank == 'BIMB') selected @endif>BIMB</option>
                                <option value="BANK MUAMALAT" @if($data->bank == 'BANK MUAMALAT') selected @endif>BANK MUAMALAT</option>
                                <option value="MBSB" @if($data->bank == 'MBSB') selected @endif>MBSB </option>
                                <option value="BSN" @if($data->bank == 'BSN') selected @endif>BSN</option>
                                <option value="PBB" @if($data->bank == 'PBB') selected @endif>PBB</option>
                                <option value="CIMB" @if($data->bank == 'CIMB') selected @endif>CIMB</option>
                                <option value="OCBC" @if($data->bank == 'OCBC') selected @endif>OCBC</option>
                                <option value="KUWAIT" @if($data->bank == 'KUWAIT') selected @endif>KUWAIT</option>
                                <option value="RHB" @if($data->bank == 'RHB') selected @endif>RHB</option>
                                <option value="AFFIN" @if($data->bank == 'AFFIN') selected @endif>AFFIN</option>
                                <option value="MAYBANK" @if($data->bank == 'MAYBANK') selected @endif>MAYBANK</option>
                            </select>
                            @error('bank')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="acc">No. Akaun</label>
                            <input class="form-control pb_height-50 reverse @error('acc') is-invalid @enderror"
                                type="text" required name="account" value="{{ $data->account }}" />
                            @error('acc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="accountBill">No. Akaun Bil</label>
                            <input type="text" name="accBill" id="accBill" class="form-control pb_height-50 reverse" value="{{ $data->accBill }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="startIDura">Dari</label>
                            <input type="date" class="form-control pb_height-50 reverse @error('startDura') is-invalid @enderror"
                                id="startDura" name="startDura" value="{{ $data->startDura }}" />
                            @error('startDura')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="startIDura">Hingga</label>
                            <input type="date" class="form-control pb_height-50 reverse @error('endDura') is-invalid @enderror"
                                id="endDura" name="endDura" value="{{ $data->endDura }}" oninput="date()"/>
                            @error('endDura')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label class="small mb-1" for="month">Tempoh/Bulan</label>
                            <input name="month" id="month" class="form-control" value="{{ $data->month }}" readonly>
                            @error('month')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label class="small mb-1" for="interest">Kadar Faedah</label>
                            <input class="form-control pb_height-50 reverse @error('int') is-invalid @enderror"
                                type="text" required name="interest" placeholder="xx.xx"
                                value="{{ $data->interest }}" />
                            @error('int')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="lastDura">Baki Pada</label>
                            <input type="date" class="form-control pb_height-50 reverse @error('lastDura') is-invalid @enderror"
                                id="lastDura" name="lastDura" value="{{ $data->lastDura }}" />
                            @error('lastDura')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label class="small mb-1" for="valLastDura">RM</label>
                            <input class="form-control pb_height-50 reverse @error('valLastDura') is-invalid @enderror"
                                id="valLastDura" name="valLastDura" required placeholder="xxxxxxxxxx.xx"
                                value="{{ $data->valLastDura }}" />
                            @error('valLastDura')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label class="small mb-1" for="total">Kadar diterima (RM)</label>
                            <input class="form-control pb_height-50 reverse @error('total') is-invaild @enderror"
                                id="total" name="total" required placeholder="xxxxxxxxxx.xx"
                                value="{{ $data->total }}" />
                            @error('total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>           
                    </div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-danger btn-lg btn-block pb_btn-pill btn-shadow-blue">
                            {{ __('Simpan') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END section -->

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

<script src="{{ asset('js/dividen.js')}}"></script>

@endsection

