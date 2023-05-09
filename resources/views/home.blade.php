@extends('layouts.app')

@section('content')
    <div class="container">

    </div>
    <hr/>
    <div class="container">
        <div class="genres-slider">
            @foreach($genres as $genre)
                <a href="{{route('genres.show',$genre->id)}}" class="genre-tile">
                    <img src="{{url($genre->img)}}" alt=""/>
                    <h4>{{$genre->name}}</h4>
                </a>
            @endforeach
        </div>
        {{--        <a class="btn btn-success" href="{{route('books.index')}}">All books</a>--}}
        <div class="slider">
            @foreach($books as $book)
                <a class="book-tile" href="{{route('books.show',$book->id)}}">
                    <div>
                        <img  alt=""
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
@endsection
