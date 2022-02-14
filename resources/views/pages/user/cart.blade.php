@extends('layouts.main')
@section('content')
    @if (Auth::check())
        <div class="mx-5 text-center" style="padding-left: 20vw; padding-right: 20vw;">
            <div class="px-5 py-5 my-5 mx-5 text-center">
                <table class="table " style="border-collapse:collapse;" id="books">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 40%">{{ __('app.title') }}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) == 0)
                            <tr>
                                <td colspan="12">
                                    {{ __('app.nouser') }}
                                </td>
                            </tr>
                        @else
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        {{ $order->ebook()->first()->title }}
                                    </td>
                                    <td><a href="/api/cart/delete/{{ $order->order_id }}">{{ __('app.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {!! $orders->links() !!}
            </div>
            <a href="/api/cart/checkout" class="btn btn-primary">Checkout</a>
        </div>
    @else
        <div class="px-5 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Amazing E-Book</h1>
            <h1 class="display-5 ">{{ __('app.motto') }}</h1>
        </div>
    @endif
@endsection
