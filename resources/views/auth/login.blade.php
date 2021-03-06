@extends('layouts.app')

@section('content')

<div class="container mt100">
    <div class="col-lg-3 text-center">
        <h3 class="title-section">Intra in cont</h3>
        <div class="separator-line-div"></div>
        <a href="/auth/facebook" class="register-fb">Conecteaza-te cu Facebook</a>
        <div class="separator-line-div"></div>
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

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center mb50">
                    <button class="creeate-account" style="margin-bottom: 0px;">Intra</button>
                    <a class="btn btn-link" style="color: #2bb88a; font-size: 16px;" href="{{ route('password.request') }}">Ai uitat parola?</a>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('javascripts')
    <script type="text/javascript">
        $('.login-form').validate({
            rules: {
                password: "required",
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                password: {
                    required: "Parola este obligatorie."
                }
            },

            submitHandler : function(form) {
                form.submit();
            }
        });
    </script>
@endsection
