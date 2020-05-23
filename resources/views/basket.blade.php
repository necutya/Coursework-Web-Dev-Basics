@extends('layouts.layout')
@section('main')
    <div class="container">
        <h1>Basket</h1>
        <div class="basket">
            @for($i=0; $i<=3; $i++)
                <div class="basket_item">
                    <img src="images/items/item.jpg">
                    <div class="basket_item_info">
                        <div>
                            <p class="meta">Найменування</p>
                            <p>Футболка <span class="nosifer">"nakaz"</span></p>
                        </div>
                        <div class="basket_item_center">
                            <p class="meta">Розмір</p>
                            <p >S/M</p>
                        </div>
                        <div>
                            <p class="meta">Ціна</p>
                            <p>250 &#8372;</p>
                        </div>
                    </div>
                    <i class="fas fa-times"></i>
                </div>
            @endfor
        </div>
        <div class="basket-nav">
            <a href="{{url('catalog')}}">← Повернутися до покупок</a>
            <div>
                <p class="price_data">До сплати: 1000₴</p>
                <p class="meta">Увага! До сплати не входить ціна за доставку.</p>
                <a class="button" href="{{url('order')}}">Продовжити</a>
            </div>
        </div>
    </div>

@endsection
