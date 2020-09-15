@extends('layouts.app')

@section('content')
<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-white" id="section-home">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
          <h2 class="heading mb-3">{{ __('Sahkan e-mel') }}</h2>
          <div class="sub-heading">
              @if (session('resent'))
                <p class="mb-4">{{ __('A fresh verification link has been sent to your email address.') }}</p>
              @endif
                <p class="mb-5">{{ __('Sila cek e-mel untuk pautan pengesahan') }}</p>
                <p class="mb-5">
                    {{ __('Jika anda tidak terima e-mel') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Tekan sini untuk penghantaran semula') }}</button>
                    </form>
                </p>
          </div>
        </div>
      </div>
    </div>
</section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
