@extends('layouts.app')

@section('content')

<div class="container mt100">
    <div class="col-lg-3 text-center">
        <h3 class="title-section">Intra in cont</h3>
        <img src="assets/images/separator2px.png" alt="" class="separator-2">
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-1">

            <form class="login-form form-style" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <input type="text" placeholder="Adresa email" value="{{ old('email') }}" name="email">
                @if ($errors->has('email'))
                    <label class="error">{{ $errors->first('email') }}</label>
                @endif
                <input type="password" placeholder="Parola" name="password">
                @if ($errors->has('password'))
                    <label class="error">{{ $errors->first('password') }}</label>
                @endif
                <label class="checkbox-custom"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span></span> Pastreaza autentificarea</label>

                <div class="col-lg-3 text-center">
                    <button class="creeate-account" style="margin-bottom: 0px;">Intra</button>
                    <a class="btn btn-link" style="color: #2bb88a; font-size: 16px;" href="{{ route('password.request') }}">Ai uitat parola?</a>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
