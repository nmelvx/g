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
        {{--{!! $page->content !!}--}}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center page-info">
                <h4>Curtea ta se află în cele mai bune mâini</h4>
                <img src="frontend/assets/images/separator.png" alt="" class="separator-line">
                <p>Mai jos puteti gasi lista de preturi standard insa in functie de numarul de comenzi<br>din zona dumneavoastra ne vom asigura ca vom oferi preturi mai mici.</p>
                <img src="frontend/assets/images/separator.png" alt="" class="separator-line">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-offset-1 col-lg-1 services text-center no-padd">
                <h3>Toaletare copaci</h3>
                <table cellpadding="0" cellspacing="0" border="0" class="prices-table" align="center">
                    <tr>
                        <td class="text-left">Tundere</td>
                        <td valign="bottom" width="40%" class="dotted"><span></span></td>
                        <td class="text-right">2 lei/mp</td>
                    </tr>
                </table>
            </div>


        </div>

    </div>

@endsection

@section('javascripts')


    <script type="text/javascript">

    </script>

@endsection