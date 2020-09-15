@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 relative align-self-center">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center">
                                <img src="image/mpk.png" alt="logo" width="40%">
                                <h2>Log Masuk</h2>
                            </div>
                            <div class="form-group">
                                <input name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nama" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Kata Laluan">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="form-check-label">{{ __('Ingat saya') }}</label>
                                <a class="float-right" style="color:blue" href="{{ route('password.request') }}">Lupa Kata Laluan</a>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="btn btn-primary btn-lg btn-block">{{ __('Log Masuk') }}</button>
                                <br>
                                {{-- <div class="text-center">
                                    <a style="color: blue" href="{{ route('register') }}">Sertai Kami</a>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END section -->
@endsection