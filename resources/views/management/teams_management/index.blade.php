@extends('layouts.default')

@section('content')
    <div class="container mt210">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                <h3 class="title-section">Management echipe</h3>
                <div class="separator-line-div"></div>
                <ul class="breadcrumbs">
                    <li><a href="" title="Contul tau">Contul tau</a></li>
                    <li><span>|</span></li>
                    <li>Management echipe</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg-gray mtb100">
                <div class="header-box">Echipe pentru contul {{ Auth::user()->lastname }} {{ Auth::user()->firstname}}<div class="container-buttons"><a href="" class="green-button show-popup" data-popup="member">Adauga membru</a> <a href="" class="green-button show-popup" data-popup="team">Adauga echipa</a></div></div>
                @foreach($teams as $k => $team)
                <div class="accordion">
                    <h3><small>Sef echipa - </small><span>{{ $team->leader->lastname }} {{ $team->leader->firstname }}</span></h3>
                    <div class="ratings">
                        <input type="radio" id="star{{$k}}5" name="rating{{$k}}" value="5" /><label class="full" for="star{{$k}}5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star{{$k}}4" name="rating{{$k}}" value="4" /><label class="full" for="star{{$k}}4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star{{$k}}3" name="rating{{$k}}" value="3" /><label class="full" for="star{{$k}}3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star{{$k}}2" name="rating{{$k}}" value="2" /><label class="full" for="star{{$k}}2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star{{$k}}1" name="rating{{$k}}" value="1" /><label class="full" for="star{{$k}}1" title="Sucks big time - 1 star"></label>
                    </div>
                    <small></small>
                </div>
                <div class="panel">

                    <div class="col-65">
                        <div class="members-title">Membri</div>
                        <ul class="members-list">
                        @foreach($team->members as $member)
                            <li>{{ $member->lastname }} {{ $member->firstname }}</li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-35">
                        <p>Performanta Echipa</p>
                        <p>Bani generati luna aceasta</p>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="content-overlay" style="display: none;">
        <div class="popup-content popup-member" style="display: none;">
            <h3>Adaugă membru</h3>
            <form action="" method="post" class="form-popup">
                <input type="text" name="firstname" placeholder="Nume">
                <input type="text" name="lastname" placeholder="Prenume">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Telefon">
                <input type="password" name="password" placeholder="Parola acces aplicatie">
                <select name="team_id">
                    <option value="">Alege echipa</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
                <a href="javascript:void(0);" data-url="{{ route('member.store') }}" class="green-button submit-form">Adauga membru</a>
            </form>
            <a href="javascript:void(0);" class="close-popup"></a>
        </div>
        <div class="popup-content popup-team" style="display: none;">
            <h3>Adaugă echipa</h3>
            <form action="" method="post" class="form-popup">
                <input type="text" name="name" placeholder="Nume echipa">
                <select name="user_id">
                    <option value="">Alege sef echipa</option>
                    @foreach($leaders as $lead)
                        <option value="{{ $lead->id }}">{{ $lead->lastname }} {{ $lead->firstname }}</option>
                    @endforeach
                </select>
                <a href="javascript:void(0);" data-url="{{ route('management-echipe.store') }}" class="green-button submit-form">Adauga echipa</a>
            </form>
            <a href="javascript:void(0);" class="close-popup"></a>
        </div>
    </div>

@endsection

@section('javascripts')


    <script type="text/javascript">

        $(document).ready(function () {

            /** accordion js **/
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].onclick = function () {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                }
            }

            /** popup **/

            $('body').on('click', '.close-popup', function (e) {
                e.preventDefault();
                $(this).parent().parent().hide();
                $(this).parent().hide();
            });

            $('body').on('click', '.show-popup', function (e) {
                e.preventDefault();
                $('.content-overlay').css({'height':$(document).height()+'px'});
                var data = $(this).data('popup');

                $('.content-overlay').show();
                $('.popup-' + data).show();

            });

            $.fn.serializeObject = function () {
                var o = {};
                var a = this.serializeArray();
                $.each(a, function () {
                    if (o[this.name] !== undefined) {
                        if (!o[this.name].push) {
                            o[this.name] = [o[this.name]];
                        }
                        o[this.name].push(this.value || '');
                    } else {
                        o[this.name] = this.value || '';
                    }
                });
                return o;
            };

            //create new task / update existing task
            $('body').on('click', '.submit-form', function (e) {

                $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
                });

                e.preventDefault();

                var formData = $(this).parent('form').serializeObject();

                var type = "POST"; //for creating new resource
                var my_url = $(this).data('url');

                console.log(formData);

                $.ajax({

                    type: type,
                    url: my_url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log('Saved!');
                    },
                    error: function (data) {
                        console.log(data.responseJSON)
                        if(data.responseJSON.success == false){
                            console.log(data.responseJSON.errors);
                        }
                    }
                });
            });

            $(window).on('load resize', function ()
            {
                $('.content-overlay').css({'height':$(document).height()+'px'});
            });


        });
    </script>

@endsection