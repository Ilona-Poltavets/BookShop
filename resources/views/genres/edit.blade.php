@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">{{ __('messages.edit_genres')}}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a class="btn btn-secondary" href="{{ route('genres.index') }}"> {{ __('messages.back') }}</a>
        <form method="POST" action="{{ route('genres.update',$genre->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('genres.form')

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
