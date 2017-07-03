<div class="popup-content popup-login" style="display: {!! (session('openLogin') == 'yes')? 'block':'none' !!};">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <h3>Întră în contul tau</h3>
            <div class="separator-line-div"></div>
            <a href="/auth/facebook" class="register-fb">Conecteaza-te cu Facebook</a>
            <div class="separator-line-div"></div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ route('login') }}" method="post" class="form-popup" id="login-form">
        {{ csrf_field() }}
        <div class="input-with-text text-left">
            <span>Email</span>
            <input type="text" placeholder="Ex: nume@nume.ro" name="email" class="form-input">
            @if ($errors->has('email'))
                <label class="error">{{ $errors->first('email') }}</label>
            @endif
        </div>
        <div class="input-with-text text-left">
            <span>Parola</span>
            <input type="password" name="password" placeholder="Parola">
            @if ($errors->has('password'))
                <label class="error">{{ $errors->first('password') }}</label>
            @endif
        </div>
        <label class="checkbox-custom" style="margin-bottom: 15px;"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span></span> Pastreaza autentificarea</label>
        <button class="green-button submit-form">Intră in cont</button>
    </form>
    <a href="javascript:void(0);" class="close-popup"></a>
    <a href="{{ route('register') }}" class="register-link">Inregistreaza-te</a>
</div>