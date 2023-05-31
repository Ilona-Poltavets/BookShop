@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{__('message.add_publisher')}}</h1>

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

        <div>
            <a class="btn btn-secondary" href="{{ route('publisher.index') }}"> {{ __('messages.back') }}</a>
        </div>
        <form method="POST" action="{{ route('publisher.store') }}" enctype="multipart/form-data">
            @csrf
            @include('publisher.form')

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __("message.add") }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
