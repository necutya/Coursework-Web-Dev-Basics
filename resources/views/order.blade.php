@extends('layouts.layout')
@section('main')


    <div class="container ">
        <h2>Make your order</h2>
        <div class="order">
            <div id="data_user">
                <form class="" method="POST" action="{{route('order')}}">
                    @csrf
                    <div class="user">
                    <div>
                        <h5>Дані покупця</h5>
                        <label for="name">ПІБ</label>
                        <input type="text" name="name_order" id="name_order" value="{{Auth::user()->name}}">
                        @error('name_order')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                        <label for="email">Пошта</label>
                        <input type="text" name="email_order" id="email_order" value="{{Auth::user()->email}}">
                        @error('email_order')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                        <label for="phone">Телефон</label>
                        <input type="text" name="phone_order" id="phone_order" value="{{Auth::user()->phone}}">
                        @error('phone_order')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <h5>Спосіб доставки</h5>
                        <label for="delivery_order">Тип доставки</label>
                        <select name="delivery_order" id="delivery_order">
                            <option value="Нова Пошта" selected>Нова Пошта</option>
                            <option value="УкрПошта" >УкрПошта</option>
                            <option value="Intime">Intime</option>
                            <option value="Самовивіз" title="Will be added soon" disabled>Самовивіз</option>
                        </select>
                    </div>
                    <div>
                        <h5>Адреса доставки</h5>

                        <label for="country_order">Країна</label>
                        <select name="country_order" id="country_order">
                            @foreach(['Україна', 'Россія', 'Білорусь'] as $country)
                                <option value="{{$country}}"
                                        @if(Auth::user()->$country == $country)selected @endif>{{$country}}</option>
                            @endforeach
                        </select>
                        <label for="city_order">Місто</label>
                        <input name="city_order" id="city_order" value="@if(Auth::user()->city){{Auth::user()->city}}@endif" >
                        @error('city_order')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                        <label for="department_order">Відділення пошти</label>
                        <input name="department_order" id="department_order">
                        @error('department_order')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <div id="row">
                        <h5>Спосіб оплати</h5>
                        <label id="big_text"><input id="inline" type="radio" name="payment_type_order"
                                                    value="Оплата при отриманні" checked>
                            <span>Оплата при отриманні</span></label>
                        <label id="big_text">
                            <input id="inline" type="radio" name="payment_type_order" value="Оплата карткою" disabled>
                            <span>Оплата карткою</span>
                            <p class="hint">Will be added soon!</p>
                        </label>
                        <br>
                        <br>
                        @error('payment_type_order')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <div id="next_line">
                        <h5>Додати коментар до замовлення</h5>
                        <label for="comment_order">Коментар</label>
                        <input type="text" name="comment_order" id="comment_order">

                    </div>
                    </div>
                    <button class="button2" type="submit"><i class="fas fa-edit"></i>Оформити замовлення</button>
                </form>
            </div>
        </div>
        <br>
    </div>

@endsection















