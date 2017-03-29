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
        <div class="row">
            <div class="col-lg-1 col-sm-1 col-xs-3 services">
                <h3>Intretinere gazon</h3>
                <ul>
                    <li><a href="">Tundere gazon</a></li>
                    <li><a href="">Aerisire gazon</a></li>
                    <li><a href="">Scarificare</a></li>
                    <li><a href="">Gazonare</a></li>
                    <li><a href="">Revigorare gazon</a></li>
                    <li><a href="">Greblare</a></li>
                    <li><a href="">Suprainsamantare</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-3 services">
                <h3>Ierbicidare</h3>
                <ul>
                    <li><a href="">Ierbicidare burieni</a></li>
                    <li><a href="">Aplicare ingrasaminte</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-3 services">
                <h3>Toaletare copaci</h3>
                <ul>
                    <li><a href="">Taiare de formare a coroanei</a></li>
                    <li><a href="">Taiere pentru regenerare a copacilor</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-sm-1 col-xs-3 services">
                <h3>Insecticide</h3>
                <ul>
                    <li><a href="">Insecticide</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-3 services">
                <h3>Plantare gazon Seminte</h3>
                <ul>
                    <li><a href="">Pregatire teren</a></li>
                    <li><a href="">Insamantare gazon</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-3 services">
                <h3>Plantare gazon rulou</h3>
                <ul>
                    <li><a href="">Pregatire teren</a></li>
                    <li><a href="">Plantare gazon*</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-sm-1 col-xs-3 services">
                <h3>Plantare copaci</h3>
                <ul>
                    <li><a href="">Pregatire teren</a></li>
                    <li><a href="">Plantare copaci</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-3 services">
                <h3>Amenajare curti</h3>
                <ul>
                    <li><a href="">Proiectare peisagistica</a></li>
                    <li><a href="">Elemente decorative - roci, fantani, alei</a></li>
                    <li><a href="">Proiectare si constructie zone legume bio</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-sm-1 col-xs-3 services">
                <h3>Sisteme de irigatie</h3>
                <ul>
                    <li><a href="">Proiectare sisteme de irigatie</a></li>
                    <li><a href="">Instalare sisteme de irigatie</a></li>
                    <li><a href="">Instalare drenaje</a></li>
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('javascripts')


    <script type="text/javascript">

    </script>

@endsection