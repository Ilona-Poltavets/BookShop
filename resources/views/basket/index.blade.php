@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Basket</h1>
        @if (count($books))
            @php
                $basketCost = 0;
            @endphp
            <form action="{{ route('basket.clear') }}" method="post" class="text-right">
                @csrf
                <button type="submit" class="btn btn-outline-danger mb-4 mt-0">
                    Clear
                </button>
            </form>
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                @foreach($books as $book)
                    @php
                        $itemPrice = $book->price;
                        $itemQuantity =  $book->pivot->quantity;
                        $itemCost = $itemPrice * $itemQuantity;
                        $basketCost = $basketCost + $itemCost;
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}">
                                {{ $book->name }}
                            </a>
                        </td>
                        <td>{{ number_format($itemPrice, 2, '.', '') }}</td>
                        <td>
                            <form action="{{ route('basket.minus', ['id' => $book->id]) }}"
                                  method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                    <i class="fas fa-minus-square"></i>
                                </button>
                            </form>
                            <span class="mx-1">{{ $itemQuantity }}</span>
                            <form action="{{ route('basket.plus', ['id' => $book->id]) }}"
                                  method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                    <i class="fas fa-plus-square"></i>
                                </button>
                            </form>
                        </td>
                        <td>{{ number_format($itemCost, 2, '.', '') }}</td>
                        <td>
                            <form action="{{ route('basket.remove', ['id' => $book->id]) }}"
                                  method="post">
                                @csrf
                                <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Sum</th>
                    <th>{{ number_format($basketCost, 2, '.', '') }}</th>
                    <th></th>
                </tr>
            </table>
            <a href="{{ route('basket.checkout') }}" class="btn btn-success float-right">
                Order
            </a>
        @else
            <p>Basket empty</p>
        @endif
    </div>
@endsection
