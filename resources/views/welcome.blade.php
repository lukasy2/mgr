<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ setting('site.title') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/half-slider.css" rel="stylesheet">

    <style>
        body {
            background-color: #E6E6FA;
            padding-top: 54px;
        }
        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }

    </style>




    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('{{ Voyager::image( setting('site.carousel_img1') ) }}')">
                <div class="carousel-caption d-md-block">
                    <h3>{{  setting('site.carousel1_title') }}</h3>
                    <p>{{  setting('site.carousel1_desc') }}</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image 1900x1080 for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('{{ Voyager::image( setting('site.carousel_img2') ) }}')">
                <div class="carousel-caption d-md-block">
                    <h3>{{  setting('site.carousel2_title') }}</h3>
                    <p>{{  setting('site.carousel2_desc') }}</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('{{ Voyager::image( setting('site.carousel_img3') ) }}')">
                <div class="carousel-caption d-md-block">
                    <h3>{{  setting('site.carousel3_title') }}</h3>
                    <p>{{  setting('site.carousel3_desc') }}</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>







</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">Start</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">


                @if (Route::has('login'))

                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            @if(Auth::user()->role_id==1)
                                <a class="dropdown-item" href="{{ url('/admin') }}">{{ trans('site.administration_panel') }}</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ trans('site.logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>


                        </div>
                    </li>
                        @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ trans('site.sign_in') }}</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ trans('site.sign_up') }}</a>
                    </li>
                            @endauth
                @endif

		@guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ trans('site.help') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('about') }}">{{ trans('site.about') }}</a>
                            <a class="dropdown-item" href="{{ route('manual') }}">{{ trans('site.manual') }}</a>
                        </div>
                    </li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ trans('site.help') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('about') }}">{{ trans('site.about') }}</a>
                            <a class="dropdown-item" href="{{ route('contact') }}">{{ trans('site.contact') }}</a>
                            <a class="dropdown-item" href="{{ route('manual') }}">{{ trans('site.manual') }}</a>
                        </div>
                    </li>
                @endauth


                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Config::get('languages')[App::getLocale()] }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                            @endif
                        @endforeach

                        </div>
                    </li>



            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-12 text-center">

            <h1 class="mt-5">{{ setting('site.title') }}</h1>
            <p class="lead">{{ setting('site.description') }}</p>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="vendor/jquery/cookiesEU-latest.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function(){
	jQuery.fn.cookiesEU({
		position:	'bottom',
	});
});

</script>


</body>

</html>
