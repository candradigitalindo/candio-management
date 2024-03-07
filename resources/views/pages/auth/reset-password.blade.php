@extends('layouts.auth')
@section('title')
    Reset Password
@endsection
@section('content')
    <div class="col-md-6 right-box">
        <div class="row align-items-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.update') }}" method="POST" id="submit">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="input-group mb-3">
                    <input type="text" name="email"
                        class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror"
                        placeholder="Email address" value="{{ $request->email ?? old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password"
                        class="@error('password') is-invalid @enderror form-control form-control-lg bg-light fs-6"
                        placeholder="Password Baru" >
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation"
                        class="@error('password_confirmation') is-invalid @enderror form-control form-control-lg bg-light fs-6"
                        placeholder="Konfirmasi Ulang Password Baru" >
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3 d-flex justify-content-between">
                    <div class="form-check">

                    </div>
                    <div class="forgot">
                        <small><a href="{{ route('login') }}">Halaman Login</a></small>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-primary primary w-100 fs-6 text-white" id="login"><span
                            class="btn-txt">RESET PASSWORD</span>
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#submit").submit(function() {
                $(".spinner-border").removeClass("d-none");
                $("#login").attr("disabled", true);
                $(".btn-txt").text("Mohon Tunggu ...");
            });
        });
    </script>
@endpush
