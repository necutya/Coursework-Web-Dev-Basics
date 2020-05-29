@extends('layouts.layout')
@section('head')
    <script src="{{ asset('scripts/change_photo.js') }}"></script>
@endsection
@section('main')

    <div class="container">
        <div class="items_elements">
            <h2 class="after_h"><span style="font-family: 'Open Sans', sans-serif">{{$item->type}}</span> <br>'{{$item->name}}'</h2>
            <div class="photos">
                <div id="main_photo" style="background-image:url({{Storage::url($item->products_photos->where('main', 1)->first()->url)}});"></div>
                <div class="small_photos">
                    @foreach($item->products_photos as $photo)
                        <div class="small_photo" style="background-image:url({{Storage::url($photo->url)}});"></div>
                    @endforeach
                </div>
            </div>
            <div class="item_descr">
                <h2 class="after_hide"><span style="font-family: 'Open Sans', sans-serif">{{$item->type}}</span> <br>'{{$item->name}}'</h2>
                <p>Розмір: {{$item->size}}</p>
                <p> Колекція:
                    <a href="{{url('catalog', $item->collection->id)}}">{{$item->collection->name}}
                    </a>

                </p>
                <p>Ціна: {{$item->price}} &#8372;</p>
                @auth
                    @if(Auth::user()->isAdmin)
                        <form action="{{route('itemRefactorForm', $item->id)}}" method="GET">
                            @csrf
                            <button class="button">Змінити товар</button>
                        </form>
                        @else
                        <form action="{{route('addToBasket', $item->id)}}" method="POST">
                            @csrf
                            <button class="button">Додати в кошик</button>
                        </form>
                    @endif
                @endauth
                @guest
                    <form action="{{route('addToBasket', $item->id)}}" method="POST">
                        @csrf
                        <button class="button">Додати в кошик</button>
                    </form>
                @endguest

            </div>
        </div>
    </div>
@endsection
