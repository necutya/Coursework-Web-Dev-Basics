@extends('layouts.layout')
@section('main')
    <div class="container ">
        <h2>{{$title}}</h2>
        <div class="new">
            <div id="data_user">
                {{--Settings--}}

                <form class="add_new" method="POST" enctype="multipart/form-data"
                action="@isset($item){{route('itemRefactor', $item->id)}}@else{{route('addItem')}}@endisset">
                    @csrf

                    <div>
                        <h5>Назва нової речі</h5>
                        <label for="new_clothes">Тип</label>
                        <select name="type" id="type">
                            @foreach(['Худі', 'Світшот', 'Футболка', 'Лонгслів',
                                    'Джинси', 'Взуття', 'Куртка', 'Пальто', 'Аксесуар', 'Джиновка'] as $type)
                                <option value="{{$type}}"
                                    @isset($item)
                                        @if($item->type == $type)
                                            selected
                                        @endif
                                    @endisset>{{$type}}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                        <label for="new_clothes">Назва</label>
                        <input type="text" name="name_cloth" id="name_cloth" placeholder="Nakaz"
                               @isset($item)value="{{$item->name}}"@endisset>
                        @error('name_cloth')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div><h5>Розмір</h5>

                        <label for="size">Розмір</label>
                        <select name="size" id="size">
                            @foreach(['XS', 'S', 'M', 'L', 'XL'] as $size)
                                <option value="{{$size}}"
                                    @isset($item)
                                        @if($item->size == $size)
                                            selected
                                        @endif
                                    @endisset>{{$size}}</option>
                            @endforeach

                        </select>
                        @error('size')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <h5>Колекція</h5>

                        <label for="collection">Колекція</label>
                        <input type="text" name="collection" id="collection" placeholder=""
                               @isset($item)value="{{$item->collection->name}}"@endisset>

                    </div>
                    <div id="row">
                        <h5>Ціна</h5>
                        <label for="new_clothes">Ціна</label>
                        <input type="text" name="price" id="price" placeholder=""
                               @isset($item)value="{{$item->price}}"@endisset>
                        @error('price')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div id="row">
                        <h5>Фото</h5>
                        <label>Завантажити головне фото</label>
                        <input type="file" class="file" name="main_photo">
                        @error('main_photo')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror

                        <label>Завантажити додаткові фото (максимально дві)</label>
                        @isset($item)
                            <label style="color: red">При оновленні додаткових фотографій,усі
                                минулі додаткові фотографії будуть видаленні</label>
                        @endisset
                        <input type="file" class="file" name="additional_photos[]" multiple="multiple">
                        @error('additional_photos')
                        <p class="help_block">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    @isset($item)
                        <button class="button2" type="submit">Змінити товар</button>
                    @else
                        <button class="button2" type="submit">Додати новий товар</button>
                    @endisset
                </form>

                @isset($item)
                    <form class="add_new" method="POST" action="{{route('delete', $item->id)}}">
                        @csrf
                        <button class="button2" type="submit">Видалити товар</button>
                    </form>
                @endisset
            </div>
        </div>

    </div>


@endsection

