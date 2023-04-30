@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="path"></div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
                <img class="img-lg" src="{{ count($book->images)>0 ? url($book->first_image_path()) : url('uploads/noimage.jpg') }}">
                <div class="d-flex flex-row">
                    @php($images=$book->images())
                    @foreach($images as $image)
                        {{ var_dump($image) }}
                        <img class="img-sm" src="{{url($image->path)}}">
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <h5 class="book-name">{{$book->name}}</h5>
                <p class="short-desc">{{$book->description}}</p>
                <p class="price">{{$book->price}}</p>

                <button class="btn btn-success text-uppercase">Add to cart</button>

                <p class="available-status">
                    @if($book->availability==true)
                        <i class="fa-solid fa-circle green"></i>
                    @else
                        <i class="fa-solid fa-circle grey"></i>
                    @endif
                    {{ __("message.availability") }}</p>
            </div>
        </div>
    </div>
@endsection
