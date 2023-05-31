@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Checkout</h1>
        <div class="checkout">
            <form>
                <div class="order-block">
                    <section class="personal-data">
                        <h3>{{ Auth->user()->name }}</h3>
                        <div class="section-block row">
                            <div class="col">

                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </section>
                    <section class="shipping-details">

                    </section>
                    <section class="payment">

                    </section>
                </div>
                <div class="side-block">
                    <section class="summary">

                    </section>
                </div>
            </form>
        </div>
    </div>
@endsection
