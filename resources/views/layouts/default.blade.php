<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Gardinero') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="{{ asset('frontend/assets/css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/components/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/components/jquery.fullpage/jquery.fullpage.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">

    @yield('css')


    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=no; target-densityDpi=device-dpi">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

@include('includes.header')

@include('includes.account-header')

@yield('content')

@include('includes.footer')

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="frontend/assets/components/bootstrap/js/bootstrap.min.js"></script>

@yield('javascripts')

<script type="text/javascript">

        $(window).on('load resize', function () {
            var windowSize = $(window).width();

            $(window).unbind('scroll');
            if(windowSize > 991)
            {
                console.log(111)
                $(window).scroll(function(){
                    if($('.border-green-bottom').length > 0)
                        $('.border-green-bottom').css('opacity', 1 - $(window).scrollTop() / 200);
                });
            }
        });

</script>

</body>
</html>