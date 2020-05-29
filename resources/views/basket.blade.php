@extends('layouts.layout')
@section('main')
    <div class="container">
        <h1>Basket</h1>
        <div class="basket">
            @if(Session::get('order'))
                @foreach(Session::get('order') as $product)
                <div class="basket_item">
                    <img src="{{Storage::url($product->main_photo()->url)}}">
                    <div class="basket_item_info">
                        <div>
                            <p class="meta">Найменування</p>
                            <p>{{$product->type}} <span class="nosifer">{{$product->name}}</span></p>
                        </div>
                        <div class="basket_item_center">
                            <p class="meta">Розмір</p>
                            <p >{{$product->size}}</p>
                        </div>
                        <div>
                            <p class="meta">Ціна</p>
                            <p>{{$product->price}}</p>
                        </div>
                    </div>
                    <form method="post" action="{{route("unsetBasketItem" ,array_search($product, Session::get('order')))}}">
                        @csrf
                        <button type="submit">
                            <i class="fas fa-times delete"></i>
                        </button>
                    </form>
                </div>
                @endforeach
            @else
                <p class="empty_basket">Ваш кошик пустий</p>
            @endif
        </div>
        <div class="basket-nav">
            <a href="{{url('catalog')}}">← Повернутися до покупок</a>
            <div>
                <p class="price_data">До сплати: @if(Session::has('order_sum')){{Session::get('order_sum')}} &#8372; @else --- @endif</p>
                <p class="meta">Увага! До сплати не входить ціна за доставку.</p>
                <a href="{{url('order')}}" class=" button @if(!Session::has('order_sum')) disabled @else @endif">Продовжити</a>
            </div>
        </div>
    </div>

@endsection
