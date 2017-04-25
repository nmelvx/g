@extends('layouts.site')

@section('content')
    <div class="header-background text-center pages-header">
        <div class="container">
            <div class="container-title">
                <h1 class="page-title">{{ $page->title }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="" title="">HOME</a></li>
                    <li>|</li>
                    <li>{{ $page->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        {!! $page->content !!}


        <div class="row">
            <div class="col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 faq no-padd">
                <h3>Prima ta comanda</h3>
                <img src="frontend/assets/images/separator2px.png" alt="" class="separator-line">
                <ul class="faq-list">
                    <li>
                        <small></small>
                        <h4>Am programat o comanda seara si e posibil sa nu fiu acasa la ora 6, ce pot face?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Pot avea incredere in voi sa va las singuri in curte?</h4>
                        <p>Bineinteles ca poti, avem cateva sute de clienti care fac asta deja. Toti angajatii nostri sunt supusi unui program de testare si training si avem sisteme de monitorizare ale angajatilor.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Daca am observatii speciale cum vi le comunic?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Trebuie sa pregatesc ceva special inainte de a veni echipa?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 faq no-padd">
                <h3>Serviciile noastre</h3>
                <img src="frontend/assets/images/separator2px.png" alt="" class="separator-line">
                <ul class="faq-list">
                    <li>
                        <small></small>
                        <h4>De ce uneori nu primesc acelasi pret la tunderea de gazon?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Ce faceti cu iarba stransa de la mine?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Daca am observatii speciale cum vi le comunic?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Trebuie sa pregatesc ceva special inainte de a veni echipa?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 faq no-padd">
                <h3>Plățile</h3>
                <img src="frontend/assets/images/separator2px.png" alt="" class="separator-line">
                <ul class="faq-list">
                    <li>
                        <small></small>
                        <h4>Cum pot beneficia de servicii gratuite?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Este plata serviciului sigura?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Cum functioneaza plata?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Pot plati cu banii jos, cash?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                    <li>
                        <small></small>
                        <h4>Voi primi o factura pentru plata efectuata?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>
                    </li>
                </ul>
            </div>
        </div>

    </div>

@endsection

@section('javascripts')


    <script type="text/javascript">
        $(document).ready(function () {
            $('body').on('click', '.faq-list li h4', function () {
                $(this).next('p').toggle();
            });
        });
    </script>

@endsection