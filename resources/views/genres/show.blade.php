@extends('layouts.app')

@section('content')
    <div class="container">
        {{--        <a class="btn btn-success" href="{{route('books.index')}}">All books</a>--}}
        <h1>{{ $genre->name }}</h1>
        <div class="tiles">
            @foreach($books as $book)
                <a href="{{route('books.show',$book->id)}}">
                    <div class="genre-book-tile">
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
@endsection
