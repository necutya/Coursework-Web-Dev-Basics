@extends('layouts.layout')
@section('main')
    <div class="container ">
        <h2>Account</h2>
        <div class="account">
            <div id="data">
                {{--Settings--}}
                <h5>Дані та налаштування</h5>
                <form class="settings">
                    <div>
                        <label for="name">ПІБ</label>
                        <input type="text" name="name" id="name" value="Artem Lebedev">
                        <label for="email">Пошта</label>
                        <input type="text" name="email" id="email" value="art.lebedev2020@gmail.com">
                        <label for="phone">Телефон</label>
                        <input type="text" name="phone" id="phone" value="+380660131335">
                    </div>
                    <div>
                        <label for="country">Країна</label>
                        <select name="country" id="country" value="Artem Lebedev">
                            <option value="ukraine" selected>Ukraine</option>
                            <option value="russia" >Russia</option>
                            <option value="Kazakhstan" >Kazakhstan</option>
                        </select>
                        <label for="city">Місто</label>
                        <select name="city" id="city" value="Artem Lebedev">
                            <option value="kiyv" selected>Київ</option>
                            <option value="skadovsk" >Скадовськ</option>
                            <option value="lviv" >Львів</option>
                        </select>
                        <button class="button2"><i class="fas fa-edit"></i>Редагувати дані</button>
                    </div>
                </form>
                <br>
                {{--Subscription--}}
                <div>
                    <h5>Підписка на розсилку</h5>
                    <form class="subscription" >
                        <label for="name">Ім'я</label>
                        <input type="text" name="name" id="name" value="Введіть своє ім'я">
                        <label for="email">Пошта</label>
                        <input type="text" name="email" id="email" value="Введіть свою пошту">
                        <button class="button2">Підписатись</button>
                    </form>
                </div>
            </div>

            {{--History--}}
            <div class="history">
                <h5>Історія покупок</h5>
                @for($i=0; $i<3; $i++)
                    <div class="basket-box-item">
                        <img src="images/items/item.jpg" alt="item-image">
                        <div>
                            <p class="meta">Найменування</p>
                            <p><a href="#">Футболка <span class="nosifer">"NAKAZ"</span></a></p>
                        </div>
                        <div class="price">
                            <p class="meta">Вартість</p>
                            <p>250 &#8372;</p>
                        </div>
                    </div>
                @endfor


                {{--Pagination (CHANGE!!!!!!!!!!!!!!!!!!!!)--}}
                <div class="pagination">
                    <a href="">1</a>
                    <a href=""class="active">2</a>
                    <a href="">3</a>
                    <a href="">4</a>
                </div>
            </div>
        </div>
    </div>
@endsection
