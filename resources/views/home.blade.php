@extends('layouts.app')

@section('content')
    <header class="home-header">
        <div class="home-slider-text">
            <h1>Everything for your library</h1>
            <div class="d-flex justify-content-around">
                <a class="btn btn-success">dfkljglkfdjgkf</a>
                <a class="btn btn-success">dfkljglkfdjgkf</a>
            </div>
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
                <h2>New products</h2><a class="link" href="{{ route('books.index') }}">Browse all products</a>
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
                <div class="promo-box-block">
                    <h4>Discount</h4>
                    <p class="up-to">up to</p>
                    <h3>50%</h3>
                    <p class="discount-p">discount on product from Genre</p>
                    <div class="d-flex justify-content-center">
                        <a class="link" href="">Show now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="category-highlights">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h2>Category highlights</h2><a class="link" href="{{ route('books.index') }}">Browse all products</a>
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
                <div class="col-12 col-md-5 discount-block">
                    <h4>Category</h4>
                    <p class="up-to">up to</p>
                    <h3>20%</h3>
                    <p class="discount-p">discount on product from Category</p>
                    <div class="d-flex justify-content-center">
                        <a class="link" href="">Show now</a>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-12 col-md-5 discount-block">
                    <h4>Discount</h4>
                    <p class="up-to">up to</p>
                    <h3>50%</h3>
                    <p class="discount-p">discount on product from Genre</p>
                    <div class="d-flex justify-content-center">
                        <a class="link" href="">Show now</a>
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
                        <h4>Grab an extra 5% discount</h4>
                        <p>Subscribe to monthly newsletter. Get the latest product updates and special offers delivered
                            right to your inbox.</p>
                    </div>
                </div>
                <div class="col-12 col-md-8 d-flex align-items-center justify-content-center">
                    <form>
                        <input type="email" name="email" placeholder="Enter your email">
                        <button type="submit" class="btn btn-footer-send">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
