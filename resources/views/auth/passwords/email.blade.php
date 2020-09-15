@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-5 relative align-self-center">
      <div class="card">
        <div class="card-body">
          <form method="POST" class="bg-white rounded pb_form_v1" action="{{ route('password.email') }}">
            @csrf
            <h2 class="mb-4 mt-0 text-center">Penukaran Kata Laluan</h2>
              <div class="form-group">
                <input type="email" class="form-control pb_height-50 reverse" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue">Hantar</button>
                <br>
                <div class="text-center">
                  <a style="color:blue" href="{{ route('login') }}">Kembali ke Log Masuk</a>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
