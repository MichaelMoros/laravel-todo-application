@extends('layout.layout')
@section('title', 'Register')
@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action='{{ route("register")}}' method="post">
                @csrf
                <h3 class="text-center text-dark">{{ __("app.register_text")}}</h3>
                <div class="form-group">
                    <label for="email" class="text-dark">{{ __("app.name_text")}}:</label><br>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('email')
                    <span class="d-block fs-6 mt-3 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">{{ __("app.email_text")}}:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                    <span class="d-block fs-6 mt-3 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">{{ __("app.password_text")}}:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                    <span class="d-block fs-6 mt-3 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="confirm-password" class="text-dark">{{ __("app.confirm_password_text")}}:</label><br>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    @error('password_confirmation')
                    <span class="d-block fs-6 mt-3 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value={{ __("app.submit_text")}}>
                </div>
                <div class="text-right mt-2">
                    <a href="/login" class="text-dark">{{ __("app.login_here_text")}}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection