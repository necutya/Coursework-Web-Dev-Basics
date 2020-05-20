@extends('layouts.layout')
@section('main')


    <div class="container ">
        <h2>Make your order</h2>
        <div class="order">
            <div id="data_user">
                {{--Settings--}}

                <form class="user">
                    <div>
                        <h5>Дані покупця</h5>
                        <label for="name">ПІБ</label>
                        <input type="text" name="name" id="name" value="Artem Lebedev">
                        <label for="email">Пошта</label>
                        <input type="text" name="email" id="email" value="art.lebedev2020@gmail.com">
                        <label for="phone">Телефон</label>
                        <input type="text" name="phone" id="phone" value="+380660131335">
                    </div>

                    <div><h5>Спосіб доставки</h5>

                        <label for="delivery">Тип доставки</label>
                        <select name="delivery" id="delivery">
                            <option value="nova_poshta" selected>Нова Пошта</option>
                            <option value="ukr_poshta" >УкрПошта</option>
                            <option value="intime">Intime</option>
                        </select>
                    </div>
                    <div>
                        <h5>Адреса доставки</h5>

                        <label for="country">Країна</label>
                        <select name="country" id="country">
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
                        <label for="department">Відділення пошти</label>
                        <select name="department" id="department">
                            <option value="1" selected>#1</option>
                            <option value="2" >#2</option>
                            <option value="3" >#3</option>
                        </select>
                    </div>
                    <div id="row">
                        <h5>Спосіб оплати</h5>
                        <label id="big_text"><input id="inline" type="radio" name="coffee" value="without">Оплата при отриманні</label>
                        <label id="big_text"><input id="inline" type="radio" name="coffee" value="without">PayPal</label>
                        <label id="big_text"><input id="inline" type="radio" name="coffee" value="without">Privat24</label>
                    </div>
                    <div id="next_line">
                        <h5>Додати коментар до замовлення</h5>
                        <label for="comment">Коментар</label>
                        <input type="text" name="comment" id="comment">

                    </div>
                </form>
                <button class="button2"><i class="fas fa-edit"></i>Оформити замовлення</button>
            </div>
        </div>


                    <br>
    </div>







@endsection















