@extends('layouts.layout')
@section('main')
    <div class="tile container" id="tile_main">
        <div id="tile_left">
            <div id="shop">
                <a href="{{url('catalog')}}">
                    <h2>Shop</h2>
                </a>
            </div>
            <div id="tile_down">
                <div id="basket">
                    <a href="{{url('basket')}}">
                        <h2>Basket</h2>
                    </a>
                </div>
                <div id="about">
                    <a href="{{url('info')}}">
                        <h2>About</h2>
                    </a>
                </div>
            </div>
        </div>
        <div id="account">
            <a href="{{url('account')}}">
                <h2>Account</h2>
            </a>
        </div>
    </div>

    <div class="container">
        <h2 class="works">My last works</h2>
        <div class="clothes">
            <img src="images/arr_right.png" class="arrow">
            <img src="images/first.jpg" class="item">
            <img src="images/second.jpg" class="item">
            <img src="images/third.jpg" class="item">
            <img src="images/arr_left.png" class="arrow">
        </div>
    </div>
@endsection

