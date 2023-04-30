@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">Edit book</h1>
        <form method="post" action="{{route('books.update',$book->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('book.form')

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('message.edit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
