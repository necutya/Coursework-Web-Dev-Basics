<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/5060e90b95.js" crossorigin="anonymous"></script>
    <script src="{{ asset('scripts/interactive.js') }}"></script>
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('images/logo_black.png')}}" type="image/x-icon">
    <title>@isset($title) {{$title}} @else Nakaz @endisset</title>
    @yield('head')

</head>
<body>
<header>
    <nav>
        <a href="{{url('landing')}}"><h4 class="white_font">nakaz 27.10</h4></a>
        <div class="links white_font">
            <a href="{{url('account')}}" class="white_font">Акаунт
                <div class="hover"></div>
            </a>
            <a href="{{url('info')}}" class="white_font">Про нас
                <div class="hover"></div>
            </a>
            <a href="{{url('catalog')}}" class="white_font">Магазин
                <div class="hover"></div>
            </a>
        </div>
        <div class="social">
            <i class="fas fa-shopping-basket white_font" id="basket_header"></i>
            @auth
                <a href="{{url('logout')}}"><i class="fas fa-sign-out-alt white_font"></i></a>
            @endauth
            @guest
                <i class="far fa-user-circle white_font" id="account_header"></i>
            @endguest
            <i class="fas fa-bars white_font" id="menu_header"></i>
        </div>
    </nav>

</header>
<main>
    {{--Menu--}}
    <div id="menu">
        <div>
            <div class="menu-item">
                <h2><i class="fas fa-link"></i> <a href="{{url('catalog')}}">Каталог товарів
                        <div class="hover"></div>
                    </a></h2>
            </div>
            <div class="menu-item">
                <h2><i class="fas fa-link"></i> <a href="{{url('info')}}">Про нас
                        <div class="hover"></div>
                    </a></h2>
            </div>
            <div class="menu-item">
                <h2><i class="fas fa-link"></i> <a href="{{url('account')}}">Акаунт
                        <div class="hover"></div>
                    </a></h2>
            </div>

            <div class="menu-item">
                <h2><i class="fas fa-link"></i> <a href="{{url('basket')}}">Кошик
                        <div class="hover"></div>
                    </a></h2>
            </div>
            @auth()
                @if(Auth::user()->isAdmin)
                    <div class="menu-item">
                        <h2><i class="fas fa-link"></i> <a href="{{route('add')}}">Додати товар
                                <div class="hover"></div>
                            </a></h2>
                    </div>

                    <div class="menu-item">
                        <h2><i class="fas fa-link"></i> <a href="{{route('orders')}}">Список усіх замовлень
                                <div class="hover"></div>
                            </a></h2>
                    </div>
                @endif
            @endauth
        </div>
        <div id="contacts-menu">
            <a href="#" class="white_font "><i class="fab fa-instagram "></i> <span> @nakaz_27_10</span>
                <div class="hover"></div>
            </a>
            <a href="#" class="white_font "> <i class="fab fa-telegram-plane"> </i> <span> @nakaz_27_10</span>
                <div class="hover"></div>
            </a>
        </div>
    </div>

    {{--Basket--}}
    <div id="basket-box" class="animatedElem">
        @if(Session::get('order'))
            <div class="scroll-bar">
            @foreach(Session::get('order') as $product)
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
                            <form method="post" action="{{route("unsetBasketItem" ,array_search($product, Session::get('order')))}}">
                                @csrf
                               <button type="submit">
                                   <i class="fas fa-times delete"></i>
                               </button>
                            </form>
                        </div>
                @endforeach
            </div>
        @else
            <p class="empty_basket">Ваш кошик пустий</p>
        @endif
        <div class="additional">
            <a href="{{url('basket')}}"  class="@if(!Session::has('order_sum')) disabled @else @endif"  >Перейти до замовлення</a>
            <p class="white_font">Сума: @if(Session::has('order_sum')){{Session::get('order_sum')}} &#8372; @else --- @endif </p>
        </div>
    </div>

    {{--Registation--}}
    <form id="registration" class="ajax-field" action="{{route('register')}}" method="POST"
          style="@if($errors->has('register_email') or $errors->has('phone') or $errors->has('full_name') or $errors->has('register_password'))
              display:flex
          @endif">
        @csrf
        <div class="">
            <h2>Registration</h2>
            <i class="fas fa-times cross"></i>
        </div>

        <label for="register_email">Email</label>
        <input  type="email" name="register_email" placeholder="Email" id="register_email" style="@error('register_email') border-color:red; @enderror" required >
        @error('register_email')
            <p class="help_block">
                {{$message}}
            </p>
        @enderror

        <label for="phone">Номер телефону</label>
        <input type="text" name="phone" value="+380"  style="@error('phone') border-color:red; @enderror" required>
            @error('phone')
                <p class="help_block">
                    {{$message}}
                </p>
            @enderror

            <label for="full_name">Призвіще, ім'я, по-батькові</label>
            <input type="text" name="full_name" placeholder="Full name"  style="@error('full_name') border-color:red; @enderror" required>
            @error('full_name')
                <p class="help_block">
                    {{$message}}
                </p>
            @enderror

        <label for="register_password">Пароль</label>
        <input type="password" name="register_password" id="register_password" placeholder="Password" style="@error('register_password') border-color:red; @enderror" required>
        @error('register_password')
            <p class="help_block">
                {{$message}}
            </p>
        @enderror

        <label for="confirm_password">Підвердження паролю</label>
        <input type="password" name="register_password_confirmation" id="password-confirm" placeholder="Confirm password" required>

        <p class="hint reset">Забули пароль?</p>
        <div class="buttons">
            <button name="make_register" type="submit"
                    style="background-color:#181818;color: #FBFBFB;">Реєстрація
            </button>
            <span id="redirect_enter">Вхід</span>
        </div>
    </form>


    {{--Login--}}
    <form id="login" method="POST" class="ajax-field" action="{{route('login')}}"
                    style="@if($errors->has('email') or $errors->has('password')) display:flex @endif">
        @csrf

        <div class="">
            <h2>Login</h2>
            <i class="fas fa-times cross"></i>
        </div>
        <label for="email">Email</label>
        <input  type="email" name="email"  value="{{ old('email') ? old('email') : ''}}" placeholder="Email"
                                                                 style="@error('email') border-color:red; @enderror" required>
        @error('email')
            <p class="help_block">
                {{$message}}
            </p>
        @enderror

        <label for="password">Пароль</label>
        <input  type="password" name="password"  placeholder="Password" value="{{ old('password')}}"
                                                                style="@error('password') border-color:red; @enderror" required>
        @error('password')
            <p class="help_block">
                {{$message}}
            </p>
        @enderror

{{--        <p class="hint" id="social-enter">Через соц. мережу</p>--}}
{{--        <div class="social-enter" >--}}
{{--            <a href=""><i class="fab fa-google" id="google"></i></a>--}}
{{--            <a href=""><i class="fab fa-facebook" id="facebook"></i></a>--}}
{{--        </div>--}}
        <p class="hint reset">Забули пароль?</p>
        <div class="buttons">
            <span id="redirect_registration">Реєстрація
            </span>
            <button type="submit"
                    style="background-color:#181818;color: #FBFBFB;">
                Вхід
            </button>
        </div>
    </form>

    {{--Reset password--}}
    <form id="reset" class="ajax-field" method="POST" action="{{ route('password.email') }}"
          style="@if($errors->has('reset-email')) display:flex @endif">
        @csrf
        <div class="">
            <h2>Reset password</h2>
            <i class="fas fa-times cross"></i>
        </div>
        <label for="reset-email">Email</label>
        <input type="email" name="reset-email" id="reset-email" style="@error('reset-email') border-color:red; @enderror" required>
        @error('reset-email')
        <p class="help_block">
            {{$message}}
        </p>
        @enderror
        <div class="buttons">
            <button name="make_reset_password" id="make_reset_password"
                    style="background-color:#181818;color: #FBFBFB;" type="submit">
                Продолжить
            </button>
        </div>
    </form>

    @include('layouts.alerts')

    @yield('main')

</main>
<footer>
    <div class="meta-data">
        <p class="white_font">© 2020 NAKAZ 27.10.</p>
        <br>
        <p class="white_font">
            Handcrafted by:
            <br>Savchenko T.
            <br>Nikishenko E.
            <br>Lebedev A.
        </p>
    </div>

    <div class="ref">
        <div class="links white_font">
            <a href="{{url('account')}}" class="white_font">Акаунт
                <div class="hover"></div>
            </a>
            <a href="{{url('info')}}" class="white_font">Про нас
                <div class="hover"></div>
            </a>
            <a href="{{url('catalog')}}" class="white_font">Магазин
                <div class="hover"></div>
            </a>
        </div>
        <a href="#" id="logo_main"><img src="{{asset('images/logo_white.png')}}"></a>
    </div>

    <div class="contacts">
        <a href="https://www.instagram.com/fucking.nakaz/" class="white_font"><i class="fab fa-instagram "></i> <span> @nakaz_27_10</span>
            <div class="hover"></div>
        </a>
        <a href="#" class="white_font"> <i class="fab fa-telegram-plane"> </i> <span> @nakaz_27_10</span>
            <div class="hover"></div>
        </a>
        <a href="#" class="white_font"> <i class="fas fa-phone"></i> <span> +380660131335</span>
            <div class="hover"></div>
        </a>

    </div>


</footer>
