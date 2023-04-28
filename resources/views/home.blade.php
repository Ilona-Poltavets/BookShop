@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-dark stripped">
        <thead>
            <tr>
                <td>#</td>
                <td>name</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>
                    {{$book->id}}
                </td>
                <td>
                    {{$book->name}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
