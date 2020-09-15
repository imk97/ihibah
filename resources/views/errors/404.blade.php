@extends('layouts.app')
@section('content')

<section class="pb_section bg-light" id="section-pricing">
  <div class="container">
    <div class="row justify-content-center">
      <div class="text-center">
        <h1 class="text-uppercase pb_font-150 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-0.5"><strong>404</strong><h2>Page Not Found</h2></h1>
        <h3 class="text-uppercase"></h3>
        <h5>The page you are looking for might have been removed had its name changed or is temporarily unavailable</h5>
        <div class="form-group">
          <a href="{{ route('home') }}"><button type="submit" class="btn btn-danger btn-lg pb_btn-pill  btn-shadow-blue" href="">Go to Homepage</button></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ENDs ection -->

<script src="{{ asset('assets/js/jquery.min.js') }}" defer></script>

<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/slick.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>


{{-- <div id="layoutError" class="bg-light">
    <div id="layoutError_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mt-4">
                            <img class="mb-4 img-error" src="assets/img/error-404-monochrome.svg" />
                            <p class="lead">This requested URL was not found on this server.</p>
                            <a href="{{ route('home') }}"><i class="fas fa-arrow-left mr-1"></i>Return to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutError_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2019</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div> --}}
@endsection