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



        
    </div>

@endsection

@section('javascripts')


    <script type="text/javascript">

    </script>

@endsection