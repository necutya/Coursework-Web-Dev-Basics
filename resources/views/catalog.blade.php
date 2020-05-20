@extends('layouts.layout')
@section('main')
    <div class="container " style="display: flex; flex-flow: column nowrap">
        <h1>Catalog</h1>
        <div class="tile">
            @for($i=0; $i<=5; $i++)
                <div class="tile_item four_item">
                    <a href="{{url('item')}}" class="tile_img" style="background-image:url(images/items/try.png);"></a>
                    <div class="tile_caption"> <a href="">Худі "NAKAZ"</a><span>500 &#8372;</span> </div>
                </div>
            @endfor
        </div>
        <div class="pagination">
            <a href="">1</a>
            <a href=""class="active">2</a>
            <a href="">3</a>
            <a href="">4</a>
        </div>
    </div>
@endsection
