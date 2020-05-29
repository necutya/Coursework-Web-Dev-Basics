@extends('layouts.layout')
@section('main')
    <div class="container">
    @foreach($orders as $order)
{{--        @for($i = 0; $i < 3; $i++)--}}
        <div class="basket-box-item orders">
            <div>
                <p class="meta">Замовлення №</p>
                <p><a href="#"><span class="nosifer">{{$order->id}}</span></a></p>
            </div>
            <div class="price">
                <p class="meta">Опрацьований</p>
                <p> @if($order->confirmed === 1)Так @else Ні @endif</p>
            </div>
            <a href="{{route('orderInfo', $order->id)}}" class="button" style="color: #fbfbfb">Детальна інформація</a>
        </div>
{{--        @endfor--}}
        @endforeach
        <div class="pagination">
            {{$orders->links()}}
        </div>
    </div>
@endsection
