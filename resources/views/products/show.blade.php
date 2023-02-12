@extends('layout')

@section('content')
<div class="product content-wrapper" style="margin-left: 200px">
    <img src="{{$post1->path}}" style="width: 500px;
    aspect-ratio: auto 500 / 500;
    height: 500px;" alt="{{$post1->name}}">
    <div style="margin-left: 5px;">
        <h1 class="name">{{$post1->name}}</h1>
        @if ($post1->discount <= 0)
        <span class="price">{{$post1->price}}&#8381;</span>
        @else
        <span class="rrp">{{$post1->discount}}&#8381;</span>
        @endif
        <form action="{{ route('cartCookie.set') }}" class="aProd" method="post">
            @csrf
            <input type="number" name="quantity" style="width: 200px;" value="1" min="1" max="{{$post1->quantity}}" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="{{$post1->id}}">
            <input type="hidden" name="price" value="{{$post1->price}}">
            <input type="hidden" name="name" value="{{$post1->name}}">
            <div class="buttons" style="text-align: left; margin-left: 0px;">
            <input type="submit" name="add_to_cart" class="btn btn-brand" style="margin-top: 5px;" value="Добавить в корзину">
            </div>
        </form>
        <div class="description">
        {{$post1->description}}
        </div>
    </div>
</div>
@endsection