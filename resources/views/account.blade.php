@extends('layouts.layout')
@section('head')
    <script src="{{asset('scripts/edit_account.js')}}"></script>
@endsection
@section('main')
    <div class="container ">
        <h2>Account</h2>
        <div class="account">
            <div id="data">
                {{--Settings--}}
                <h5>Дані та налаштування</h5>
                <form class="settings" method="POST" action="">
                    @csrf
                    <div>
                        <label for="name">ПІБ</label>
                        <input type="text" name="name_settings" id="name_settings" value="{{Auth::user()->name}}" disabled>
                        <label for="email">Пошта</label>
                        <input type="text" name="email_settings" id="email_settings" value="{{Auth::user()->email}}" disabled>
                        <label for="phone">Телефон</label>
                        <input type="text" name="phone_settings" id="phone_settings" value="{{Auth::user()->phone}}" disabled>
                    </div>
                    <div>
                        <label for="country">Країна</label>
                        <select name="country_settings" id="country_settings" disabled>
                            <option value="Україна" selected>Україна</option>
                            <option value="Россія" >Россія</option>
                            <option value="Білорусь" >Білорусь</option>
                        </select>
                        <label for="city">Місто</label>
                        <input name="city_settings" id="city_settings"
                               value="@if(Auth::user()->city){{Auth::user()->city}}@elseКиїв@endif " disabled>
                        <button class="button2" id="edit" type="button"><i class="fas fa-edit"></i>Редагувати</button>
                    </div>
                </form>
                <br>
                {{--Subscription--}}
                <div>
                    <h5>Підписка на розсилку</h5>
                    @if(Auth::user()->subscription)
                        <p class="hint">Ви вже підписані на нашу розсилку</p>
                    @else
                        <p class="hint">Підписавшись на розсилку, ви будете отримувати інформацію про кожен новий
                            товар нашого магазину</p>
                    @endif
                    <form class="subscription" action="@if(Auth::user()->subscription){{route('account.unsubscribe')}}
                                                       @else{{route('account.subscribe')}}@endif" method="POST">
                        @csrf
                        <label for="name">Ім'я</label>
                        <input type="text" name="name_sub" id="name_sub" value="{{Auth::user()->name}} " disabled>
                        @error('name_sub')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                      <label for="email">Пошта</label>
                        <input type="text" name="email_sub" id="email_sub" value="{{Auth::user()->email}}" disabled>
                        @error('email_sub')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                        @if(Auth::user()->subscription)
                            <button class="button2" type="submit">Відписатись</button>
                        @else
                            <button class="button2" type="submit">Підписатись</button>
                        @endif
                    </form>
                </div>
            </div>

            {{--History--}}
            <div class="history scroll-bar">
                <h5>Історія покупок</h5>
                @if(count($products_history) > 0)
{{--                @isset($products_history)--}}
                    @foreach($products_history as $product)
                        <div class="basket-box-item">
                            <img src="{{Storage::url($product->main_photo()->url)}}" alt="item-image">
                            <div>
                                <p class="meta">Найменування</p>
                                <p><a href="#">{{$product->type}} <span class="nosifer">{{$product->name}}</span></a></p>
                            </div>
                            <div class="price">
                                <p class="meta">Вартість</p>
                                <p>{{$product->price}} &#8372;</p>
                            </div>
                        </div>
                    @endforeach
{{--                    <div class="pagination">--}}
{{--                        {{$products_history->links()}}--}}
{{--                    </div>--}}
                @else
                    <p class="info">Ви ще не робили покупок у магазині:(
                @endif
{{--                @endisset--}}
            </div>
        </div>
    </div>
@endsection
