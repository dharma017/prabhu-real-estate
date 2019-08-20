<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Prabhu Real Estate') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/materialize.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    @yield('styles')

    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet">
</head>

    <body>

        {{-- MAIN NAVIGATION BAR --}}
        @include('frontend.partials.navbar')

        {{-- SLIDER SECTION --}}
        @if(Request::is('/'))
            @include('frontend.partials.slider')
        @endif

        {{-- SEARCH BAR --}}
        @include('frontend.partials.search')

        {{-- MAIN CONTENT --}}
        <div class="main">
            @yield('content')
        </div>

        {{-- FOOTER --}}
        @include('frontend.partials.footer')


        <!--JavaScript at end of body for optimized loading-->
        {{-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/materialize.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml            : true,
                    version          : 'v4.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Your customer chat code -->
        <div class="fb-customerchat"
             attribution=setup_tool
             page_id="604533396645559">
        </div>

        <script>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}','Error',{
                        closeButtor: true,
                        progressBar: true
                    });
                @endforeach
            @endif
        </script>

        @yield('scripts')

        <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();

            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true,
            });

            $('.carousel.testimonials').carousel({
                indicators: true,
            });

            var city_list =<?php echo json_encode($citylist); ?>;
            $('input.autocomplete').autocomplete({
                data: city_list
            });

            $(".dropdown-trigger").dropdown({
                top: '65px',
                // hover : true,
                coverTrigger: false,
                alignment: 'left'
            });

            $('.tooltipped').tooltip();

             $( '.sidebar-search' ).parents( 'body' ).addClass( 'has-side-bar' ).find( '.indigo.search-bar' ).remove();
        });
        </script>

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d5b54c0ddc00c70"></script>

    </body>
  </html>