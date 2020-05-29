@extends('layouts.layout')
@section('main')
    <div class="container order-info">
        <div class="order-meta">
            <h3>Order info</h3>
            <p>Ім'я: <span> {{$order->name}}</span></p>
            <p>Телефон: <span> {{$order->phone}}</span></p>
            <p>Електронна пошта: <span> {{$order->email}}</span></p>
            <p>Країна: <span> {{$order->country}}</span></p>
            <p>Місто: <span> {{$order->city}}</span></p>
            <p>Вид доставки: <span> {{$order->post_type}}</span></p>
            <p>Відділення: <span> {{$order->department}}</span></p>
            <p>Вид оплати: <span> {{$order->payment_type}}</span></p>
            @isset($order->comment)
                <p>Коментар до замовлення: <span> {{$order->comment}}</span></p>
            @endisset
            <p>Відпрацьоване: <span> @if($order->confirmed === 1)Так @else Ні @endif</span></p>
        </div>
        <div class="order-items">
            <h3>Order items list</h3>
            @foreach($order->products as $product)
                <div class="basket-box-item">
                    <img src="{{Storage::url($product->main_photo()->url)}}" alt="item-image">
                    <div>
                        <p class="meta">Найменування</p>
                        <p><a href="#">{{$product->type}} <span class="nosifer">{{$product->name}}</span>
                                <div class="hover"></div>
                            </a></p>
                    </div>
                    <div class="price">
                        <p class="meta">Ціна</p>
                        <p>{{$product->price}} &#8372;</p>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="price_data">Сума замовлення: {{$order->price}}</p>

        <form method="post" action="{{route('orderConfirm', $order->id)}}">
            @csrf
            <button type="submit" class="button2" @if($order->confirmed === 1) disabled @endif>
                Позначити замовлення, як виконане
            </button>
            @if($order->confirmed === 1) <p class="help_block">Замовлення вже опрацьоване</p> @endif
        </form>
    </div>

@endsection
