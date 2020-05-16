<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/5060e90b95.js" crossorigin="anonymous"></script>
    <link href="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <a href="#" ><h4 class="white_font" >nakaz 27.10</h4></a>
            <div class="links white_font">
                <a href="#"  class = "white_font">Контакты</a>
                <a href="#"  class = "white_font">Про нас</a>
                <a href="#"  class = "white_font">Магазин</a>
            </div>
            <div class="social">
                <i class="fas fa-shopping-basket white_font"></i>
                <i class="fas fa-bars white_font" id="menu_header"></i>
            </div>
        </nav>
    </header>
    <main>
    @yield('main')
    </main>
    <footer>
        <div class="meta-data">
            <p class = "white_font">© 2020 NAKAZ 27.10.</p>
            <br>
            <p class = "white_font">
                Handcrafted by:
                <br>Savchenko T.
                <br>Nikishenko E.
                <br>Lebedev A.
            </p>
        </div>

        <div class="ref">
            <div class="links white_font">
                <a href="#"  class = "white_font">Акаунт</a>
                <a href="#"  class = "white_font">Про нас</a>
                <a href="#"  class = "white_font">Магазин</a>
            </div>
            <a href="#" id="logo_main"><img src="images/logo_white.png"></a>
        </div>

        <div class="contacts">
            <a href="#" class = "white_font"><i class="fab fa-instagram "></i> <span> @nakaz_27_10</span></a>
            <a href="#" class = "white_font"> <i class="fab fa-telegram-plane"> </i> <span> @nakaz_27_10</span></a>
            <a href="#" class = "white_font"> <i class="fas fa-phone"></i> <span> +380660131335</span></a>

        </div>


    </footer>
