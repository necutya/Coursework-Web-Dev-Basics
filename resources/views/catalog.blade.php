@extends('layouts.layout')


@section('main')
    <div class="container " style="display: flex; flex-flow: column nowrap">
        <h1>Catalog</h1>
        <div class="tile">
            @foreach($products as $product)
                <div class="tile_item four_item">
                    <a href="{{url('item/'.$product->id)}}" class="tile_img" style=" background-image:url({{Storage::url($product->main_photo()->url)}});"></a>
                    <div class="tile_caption"> <a href="{{url('item/'.$product->id)}}">{{$product->type}} '{{$product->name}}'</a><span>{{$product->price }} &#8372;</span> </div>
                </div>
            @endforeach
        </div>
        <div class="pagination">
            {{$products->links()}}
        </div>
    </div>
@endsection
