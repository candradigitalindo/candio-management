@extends('layouts.auth')
@section('title')
    Login
@endsection
@section('content')
    <div class="col-md-6 right-box">
        <div class="row align-items-center">
            <div class="header-text mb-4">
                <h2>Selamat Datang</h2>
                <p>Waktunya kembali bekerja!</p>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST" id="submit">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="email"
                        class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror"
                        placeholder="Email address" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-1">
                    <input type="password" name="password"
                        class="@error('password') is-invalid @enderror form-control form-control-lg bg-light fs-6"
                        placeholder="Password" >
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember
                                Me</small></label>
                    </div>
                    <div class="forgot">
                        <small><a href="{{ route('password.request') }}">Forgot Password?</a></small>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-primary primary w-100 fs-6 text-white" id="login"><span
                            class="btn-txt">Login</span>
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
