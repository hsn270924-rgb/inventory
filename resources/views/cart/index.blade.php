@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-6">Shopping Cart</h2>

        @if(empty($cart))
            <p class="text-gray-500">Your cart is empty</p>
        @else
            @php $total = 0; @endphp

            @foreach($cart as $item)
                @php $total += $item['price'] * $item['quantity']; @endphp

                <div class="flex items-center justify-between border-b py-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ $item['image'] }}" class="w-16 h-16 object-contain">
                        <div>
                            <p class="font-medium">{{ $item['title'] }}</p>
                            <p class="text-sm text-gray-500">
                                ${{ $item['price'] }} × {{ $item['quantity'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="text-right mt-6">
                <p class="text-lg font-semibold mb-4">Total: ${{ number_format($total, 2) }}</p>

                <form method="POST" action="/checkout">
                    @csrf
                    <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                        Checkout
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection