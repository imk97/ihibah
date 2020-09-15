@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 relative align-self-center">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="text-center">
                                <img src="image/mpk.png" alt="logo" width="40%">
                                <h2>Daftar</h2>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="E-Mel">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Kata Laluan">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="password_confirmation" type="password"
                                        class="form-control @error('Cpassword') is-invalid @enderror"
                                        placeholder="Ulang Kata Laluan">
                                    @error('Cpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit"
                                    class="btn btn-primary btn-lg btn-block">{{ __('Daftar') }}</button>
                                <br>
                                <div class="text-center">
                                    <a href="{{ route('login') }}" style="color: blue">{{ __('Kembali ke login') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END section -->
@endsection