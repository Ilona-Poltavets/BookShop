<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ url('slick/slick/slick-theme.css') }}">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />

    <script type="text/javascript" src="{{url('js/jquery-3.6.4.min.js')}}"></script>

</head>
<body>
<div id="app">

    <header>
        <div class="navigation-pc">
            <a href="javascript:void(0);">
                <div class="sale">
                    <p>{{__("message.Book_Easter: discount up to -80% on everything")}}</p>
                </div>
            </a>
            <div class="upper-nav">
                <div class="logo">
                    <a href="{{ route('home') }}" style="color: #444444;">
                        <i class="fa-solid fa-at" style="margin-right: 10px;"></i>
                        Bookverse
                    </a>
                </div>
                <div class="search">
                    <form id="searchForm" action="{{ route('search.book') }}" method="POST">
                        @csrf
                    <i class="fa-solid fa-magnifying-glass" style="position: absolute; padding: 13px;"></i>
                    <input type="search" class="form-control" id="search" placeholder="Search..."
                           style="padding:7px 7px 7px 35px; "/>
                    </form>
                </div>
                <div class="personal">
                    <a href="{{ route('basket.index') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="javascript:void(0)" style="margin-left: 20px;"><i class="fa-regular fa-heart"></i></a>
                    @guest
                        <a href="{{ route('login') }}" style="margin-left: 20px;"><i class="fa-regular fa-user"
                                                                                     style="margin-right: 4px;"></i>{{ __('message.Login') }}
                        </a>
                        <a style="margin-left: 20px;" href="{{ route('register') }}">{{ __('message.Register') }}</a>
                    @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                {{ __('message.Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
            <div class="lower-nav">
                <div class="left-links">
                    <a href="{{ route('books.index') }}" style="margin-left: 35px;">{{ __("message.Products") }}</a>
                    <a href="javascript:void(0)" style="margin-left: 35px;">{{ __("message.SALE") }}</a>
                    <a href="{{ route('top_books') }}" style="margin-left: 35px;">{{__("message.TOP_books")}}</a>
                    <a href="{{ route('publisher.index') }}" style="margin-left: 35px;">{{__("message.Publishers")}}</a>
                </div>
                <div class="right-links">
                    <a href="javascript:void(0)" style="margin-right: 35px;">{{__("message.Shipping")}}</a>
                    <a href="javascript:void(0)" style="margin-right: 35px;">{{__("message.Payment")}}</a>
                    <a href="javascript:void(0)" style="margin-right: 35px;">{{__("message.Contact")}}</a>
                </div>
            </div>
        </div>
        <div class="navigation-mobile" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="mobile-menu">
                <i id="mobileShow" onclick="showMobileMenu();" class="fa-solid fa-bars"></i>
                <i id="mobileHide" onclick="hideMobileMenu();" class="fa-solid fa-x"></i>
                <div class="mobile-menu-container">
                    <div class="mobile-links"
                         style="display: flex; flex-direction: column; padding: 120px; font-size: 26px;">
                        <a href="{{ route('books.index') }}">{{ __("message.Products") }}</a>
                        <a href="javascript:void(0)">{{ __("message.SALE") }}</a>
                        <a href="{{ route('top_books') }}">{{__("message.TOP_books")}}</a>
                        <a href="{{ route('publisher.index') }}">{{__("message.Publishers")}}</a>
                        <a href="javascript:void(0)">{{__("message.Shipping")}}</a>
                        <a href="javascript:void(0)">{{__("message.Payment")}}</a>
                        <a href="javascript:void(0)">{{__("message.Contact")}}</a>
                        <div class="personal" style="margin-top: 20px; font-size: 30px;">
                            <a href="{{ route('basket.index') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                            <a href="javascript:void(0)" style="margin-left: 20px;"><i
                                    class="fa-regular fa-heart"></i></a>
                            <a href="{{ route('login') }}" style="margin-left: 20px;"><i class="fa-regular fa-user"
                                                                                         style="margin-right: 4px;"></i>{{ __('message.Login') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-mobile">
                <i class="fa-solid fa-magnifying-glass" style="position: absolute; padding: 13px;"></i>
                <input type="search" class="form-control" id="search" placeholder="Search..."
                       style="padding:7px 7px 7px 35px; "/>
            </div>
        </div>
        <hr class="line" style="border: 1px solid #d8d8d8"/>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-xxl-2 py-3">
                    <h5>
                        {{__("message.Need_help")}}?
                    </h5>
                    <a class="btn btn-secondary">{{__("message.Contact_us")}}</a>
                </div>
                <div class="col-12  col-md-6 col-xxl-3 py-3">
                    <h5>
                        {{__("message.Customer_Support")}}
                    </h5>
                    <ul>
                        <li><a href="#">{{__("message.Returns_&_Warranty")}}</a></li>
                        <li><a href="#">{{__("message.Payment")}}</a></li>
                        <li><a href="#">{{__("message.Shipping")}}</a></li>
                        <li><a href="#">{{__("message.Terms_of_Service")}}</a></li>
                        <li><a href="#">{{__("message.Privacy_Policy")}}</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-xxl-3 py-3">
                    <h5>
                        {{__("message.Corporate_Info")}}
                    </h5>
                    <ul>
                        <li><a href="#">{{__("message.About_Us")}}</a></li>
                        <li><a href="#">{{__("message.Brands")}}</a></li>
                        <li><a href="#">{{__("message.Affiliates")}}</a></li>
                        <li><a href="#">{{__("message.Investors")}}</a></li>
                        <li><a href="#">{{__("message.Cookies")}}</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-xxl-2 py-3">
                    <h5>
                        {{__("message.Gift_card")}}
                    </h5>
                    <ul>
                        <li><a href="#">{{__("message.Buy_Gift_Cards")}}</a></li>
                        <li><a href="#">{{__("message.Redeem_Card")}}</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-12 col-xxl-2  py-3 d-flex justify-content-between flex-column">
                    <div>
                        <h5>
                            {{__("message.Location")}}
                        </h5>
                        <select id="select-lang"
                                onchange="top.location.href = 'setlocale/'+this.options[this.selectedIndex].value">
                            <option value="us"
                                    @if((App::isLocale('us'))) selected @endif>
                                United States
                            </option>
                            <option value="uk"
                                    @if((App::isLocale('uk'))) selected @endif>
                                Україна
                            </option>
                        </select>
                    </div>
                    <div class="brands">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script type="text/javascript" src="{{url('slick/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/slider.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script type="text/javascript" src="{{url('js/scripts.js')}}"></script>
<script>
    $("#searchInput").on("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            $("#searchForm").submit();
        }
    });

    $.ajax({
        url: '{{ route("suggestions") }}',
        method: 'GET',
        data: { query: $('#search').val() },
        success: function (response) {
            // Обработайте полученные подсказки
        },
        error: function (xhr, status, error) {
            // Обработайте ошибку
        }
    });

    // Запрос для расширенного поиска при нажатии клавиши Enter
    $('#searchForm').on('submit', function (event) {
        event.preventDefault();
        var searchQuery = $('#search').val();

        $.ajax({
            url: '{{ route("search.book") }}',
            method: 'POST',
            data: { query: searchQuery },
            success: function (response) {
                // Перейдите на страницу с результатами расширенного поиска
                window.location.href = response.redirectUrl;
            },
            error: function (xhr, status, error) {
                // Обработайте ошибку
            }
        });
    });

</script>
</body>
</html>
