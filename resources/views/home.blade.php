@extends('layouts.app')

@section('content')
    <header class="home-header">
        <div class="home-slider-text">
{{--            <h1>Everything for your library</h1>--}}
{{--            <div class="d-flex justify-content-around">--}}
{{--                <a class="btn btn-success">dfkljglkfdjgkf</a>--}}
{{--                <a class="btn btn-success">dfkljglkfdjgkf</a>--}}
{{--            </div>--}}
        </div>
        <div class="home-slider">
            <img src="{{ url('images/1.jpg') }}" alt="">
            <img src="{{ url('images/2.jpg') }}" alt="">
            <img src="{{ url('images/3.png') }}" alt="">
        </div>
    </header>

    <hr/>

    <section class="container">
        <div class="genres-slider">
            @foreach($genres as $genre)
                <a href="{{route('genres.show',$genre->id)}}" class="genre-tile">
                    <img src="{{url($genre->img)}}" alt=""/>
                    <h4>{{$genre->name}}</h4>
                </a>
            @endforeach
        </div>
    </section>

    <hr/>

    <section class="new-products">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h2>{{ __("message.New_products")}}</h2><a class="link" href="{{ route('books.index') }}">{{ __("message.Browse_all_products")}}</a>
            </div>
            <div class="slider">
                @foreach($books as $book)
                    <a class="book-tile" href="{{route('books.show',$book->id)}}">
                        <div>
                            <img alt=""
                                 src="{{ count($book->images)>0 ? url($book->first_image_path()) : url('uploads/noimage.jpg') }}">
                            <h4>{{$book->name}}</h4>
                            <p>{{$book->description}}</p>
                            <p class="price">{{$book->price}}</p>
                        </div>
                    </a>
                @endforeach
                <a href="{{route('books.index')}}">
                    <div class="book-tile d-flex justify-content-center align-items-center">
                        {{ __('message.more_books') }}
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="promo-box">
        <div class="container">
            <div class="row">
                <div class="promo-box-block" style="background-image: url('images/4.jpg')">
                    <h4 style="color:white;">{{ __("message.Discount")}}</h4>
                    <p style="color:white;" class="up-to">{{ __("message.up_to")}}</p>
                    <h3 style="color:white;">50%</h3>
                    <p style="color:white;" class="discount-p">{{ __("message.discount_on_product_from_Genre")}}</p>
                    <div class="d-flex justify-content-center">
                        <a class="link" href="">{{ __("message.Show_now")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="category-highlights">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h2>{{ __("message.Category_highlights")}}</h2><a class="link" href="{{ route('books.index') }}">{{ __("message.Browse_all_products")}}</a>
            </div>
            <div class="slider">
                @foreach($books as $book)
                    <a class="book-tile" href="{{route('books.show',$book->id)}}">
                        <div>
                            <img alt=""
                                 src="{{ count($book->images)>0 ? url($book->first_image_path()) : url('uploads/noimage.jpg') }}">
                            <h4>{{$book->name}}</h4>
                            <p>{{$book->description}}</p>
                            <p class="price">{{$book->price}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="discount">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 discount-block" style="background-image: url('images/6.jpg')">
                    <h4>{{ __("message.Category")}}</h4>
                    <p class="up-to">{{ __("message.up_to")}}</p>
                    <h3>20%</h3>
                    <p class="discount-p">{{ __("message.discount_on_product_from_Category")}}</p>
                    <div class="d-flex justify-content-center">
                        <a class="link" href="">{{ __("message.Show_now")}}</a>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-12 col-md-5 discount-block" style="background-image: url('images/5.jpg')">
                    <h4 style="color:white;">{{ __("message.Discount")}}</h4>
                    <p style="color:white;" class="up-to">{{ __("message.up_to")}}</p>
                    <h3 style="color:white;">50%</h3>
                    <p style="color:white;" class="discount-p">{{ __("message.discount_on_product_from_Genre")}}</p>
                    <div class="d-flex justify-content-center">
                        <a class="link" href="" style="color:white;">{{ __("message.Show_now")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 d-flex align-items-center">
                    <div class="text-center text">
                        <h4>{{ __('message.Grab_an_extra') }}</h4>
                        <p>{{ __("message.subscribe_to_monthly_newsletter")}}</p>
                    </div>
                </div>
                <div class="col-12 col-md-8 d-flex align-items-center justify-content-center">
                    <form>
                        <input type="email" name="email" placeholder="Enter your email">
                        <button type="submit" class="btn btn-footer-send">{{__("message.Subscribe")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
