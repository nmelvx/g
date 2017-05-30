

    <div class="popup-content popup-address" style="display: none;">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                <h3>Adresa ta</h3>
                <p>Introduceti adresa corecta pentru a primi oferta cat mai clara</p>
            </div>
        </div>
        <form method="post" class="form-popup form-address">
            <div id="maps-info" class="no-transition"></div>
            <div class="input-with-text relative text-left">
                <span>Adresa ta</span>
                <div class="clearfix"></div>
                <input type="text" id="autocomplete" placeholder="Padureni nr 10" name="address" value="{{ Auth::user()->address }}" class="form-input">
                <button class="get-address"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            {{ Form::hidden('latitude', Auth::user()->latitude) }}
            {{ Form::hidden('longitude', Auth::user()->longitude) }}
            {{ csrf_field() }}

            <button class="green-button submit-form">Salveaza modificarile</button>
        </form>
        <a href="javascript:void(0);" class="close-popup"></a>
    </div>
