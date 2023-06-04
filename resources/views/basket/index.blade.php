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
<body style="background-color: #F6F6F6;">
<div class="checkout-header" style="background-color: #fff;">
    <div class="logo">
        <a href="{{ route('home') }}" style="color: #444444;"><i class="fa-solid fa-at"
                                                                 style="margin-right: 10px;"></i>Bookverse</a>
    </div>
    <div class="back_support" style="display: flex; flex-direction: row; justify-content: space-between;">
        <div class="back">
            <a href="{{ URL::previous() }}"><i class="fa-solid fa-arrow-left"></i> {{__("message.back")}}</a>
        </div>
        <div class="support">
            <a href="javascript:void(0)"><i
                    class="fa-regular fa-circle-question"></i> {{__("message.Customer_Support")}}</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="checkout-title" style="text-align: center;">
        <h4 style="font-size: 32px; font-weight: 700;">{{__("message.shopping_cart")}}</h4>
    </div>
    <div class="checkout-subtitle" style="text-align: center;">
        <p>{{ __("message.shipping_charges_and_discount_codes_applied_at_checkout") }}</p>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    <p style="font-size: 20px; font-weight: 700; color:#414141; margin-top: 20px;">
                        {{ __("message.your_order") }}
                    </p>
                </div>
                <div class="col-12"
                     style="background-color: #fff; border-radius: 10px; margin-bottom: 5px; padding: 20px; font-size: 20px; display: flex; flex-direction: row; justify-content: space-between;">
                    @php $basketCost=0 @endphp
                    @foreach( $books as $book )
                        @php
                            $itemPrice = $book->price;
                            $itemQuantity =  $book->pivot->quantity;
                            $itemCost = $itemPrice * $itemQuantity;
                            $basketCost = $basketCost + $itemCost;
                        @endphp
                        <div style="display: flex; flex-direction: row;">
                            <div class="image_shipping" style="margin-right: 20px;">
                                <img src="{{ count($book->images)>0 ? url($book->first_image_path()) : url('uploads/noimage.jpg') }}"/>
                            </div>
                            <div class="product" style="font-size: 18px;">
                                <p style="margin-bottom: 5px;">{{$book->name}}</p>
                                <p style="font-size: 16px; color:#414141;">{{$book->description}}</p>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div class="trash-can">
                                <form action="{{ route('basket.remove', ['id' => $book->id]) }}"
                                      method="post">
                                    @csrf
                                    <button type="submit" class="btn" style="background-color: #F6F6F6;"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>

                            </div>
                            <div class="price">{{$book->price}}</div>
                        </div>
                    @endforeach
                </div>
                <div class="safe_easy" style="margin-top: 20px; font-size: 22px; padding: 20px 40px;">
                    <p style="font-size: 24px; color:#414141; font-weight: 700;"> {{__("message.Safe_&_easy_shopping")}}</p>
                    <p style="color:#5b5b5b;"><i class="fa-solid fa-rotate-left"></i> {{__("message.Free_returns_for_30_days")}}</p>
                    <hr style="border: 1px solid #414141;">
                    <p style="color:#5b5b5b;"><i class="fa-regular fa-credit-card"></i> {{__("message.Convenient_payment_methods")}}</p>
                    <hr style="border: 1px solid #414141;">
                    <p style="color:#5b5b5b;"><i class="fa-solid fa-truck"></i> {{__("message.Deliver_to_home_or_pick_up_point")}}</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="col-12" style="margin-top: 20px;">
                <p style="font-size: 22px; font-weight: 700;">{{ __("message.summary")}}</p>
            </div>
            <div class="col-12" style="background-color: #fff; border-radius: 10px; padding: 20px;">
                <div style="display: flex; flex-direction: row; justify-content: space-between;">
                    <p>{{ __("message.items_in_the_Cart")}}</p>
                    <p>${{$basketCost+3.50}}</p>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: space-between; color:#989797;">
                    <p>{{ __("message.savings_applied")}}</p>
                    <p>$-00.00</p>
                </div>
                <hr style="border: 1px solid #cfcfcf;"/>
                <div style="display: flex; flex-direction: row; justify-content: space-between;">
                    <p>{{ __("message.TOTAL")}}</p>
                    <p>${{$basketCost}}</p>
                </div>
                <div style="text-align: center;">
                    <a href="{{ route("basket.checkout") }}" class="btn btn-dark"
                       style="padding: 10px 20px; width: 100%; max-width: 100%;">GO TO
                        CHECKOUT
                    </a>
                </div>
            </div>
            <div class="col-12"
                 style="background-color: #fff; margin-top: 20px; border-radius: 10px; padding: 20px;">
                <div class="row">
                    <div class="col-12">
                        <p>DISCOUNT CODE/GIFT CARD</p>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="text" placeholder="Code..."/>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-dark">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
