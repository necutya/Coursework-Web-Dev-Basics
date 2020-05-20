<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/5060e90b95.js" crossorigin="anonymous"></script>
    <script src="scripts/interactive.js"></script>
    <link href="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
    <title>Document</title>
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
            <i class="far fa-user-circle white_font" id="account_header"></i>
            <i class="fas fa-shopping-basket white_font" id="basket_header"></i>
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
        @for($i=0; $i<3; $i++)
            <div class="basket-box-item">
                <img src="images/items/item.jpg" alt="item-image">
                <div>
                    <p class="meta">Найменування</p>
                    <p><a href="#">Футболка <span class="nosifer">"NAKAZ"</span>
                            <div class="hover"></div>
                        </a></p>
                </div>
                <div class="price">
                    <p class="meta">Ціна</p>
                    <p>250 &#8372;</p>
                </div>
                <i class="fas fa-times"></i>
            </div>
        @endfor
        <div class="additional">
            <a href="{{url('basket')}}">Перейти до замовлення</a>
            <p class="white_font">Сума: 1500 &#8372;</p>
        </div>
    </div>

    {{--Registation--}}
    <form id="registration" class="ajax-field">
        <div class="">
            <h2>Registration</h2>
            <i class="fas fa-times cross"></i>
        </div>
        <label for="phone">Номер телефону</label>
        <input type="text" name="phone" id="phone" value="+380" required>
        <label for="full_name">Призвіще, ім'я, по-батькові</label>
        <input type="text" name="full_name" id="full_name" required>
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password" required>
        <label for="confirm_password">Підвердження паролю</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <a class="hint" href="">Забули пароль?</a>
        <div class="buttons">
            <button name="make_register"
                    style="background-color:#181818;color: #FBFBFB;">Реєстрація
            </button>
            <span id="redirect_enter">Вхід</span>
        </div>
    </form>


    {{--Login--}}
    <form id="login" class="ajax-field">
        <div class="">
            <h2>Login</h2>
            <i class="fas fa-times cross"></i>
        </div>
        <label for="phone">Номер телефону</label>
        <input type="text" name="phone" id="phone" value="+380" required>
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password" required>
        <p class="hint" id="social-enter">Через соц. мережу</p>
        <div class="social-enter" >
            <a href=""><i class="fab fa-google" id="google"></i></a>
            <a href=""><i class="fab fa-facebook" id="facebook"></i></a>
        </div>
        <a class="hint" href="">Забули пароль?</a>
        <div class="buttons">
            <span id="redirect_registration">Реєстрація
            </span>
            <button name="make_enter"
                    style="background-color:#181818;color: #FBFBFB;">
                Вхід
            </button>
        </div>
    </form>


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
        <a href="#" id="logo_main"><img src="images/logo_white.png"></a>
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
