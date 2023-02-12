@extends('layout')

@section('content')
<?php

use App\Http\Controllers\ShoppingCartController;
use Illuminate\Routing\Controllers\Middleware;

?>
<div class="section-main">
    <section class="section">
        @if ($data === [])
        <div class="container mt-2 mb-4">
            <div class="row">
                <div class="col-12" style="position: relative;">
                    <div style="display: inline-block; overflow: hidden;">
                        <a href="/">
                            <img class="profile-author__img" width="69" height="69" src="view/img/Megasmuck_logo.jpg">
                        </a>
                    </div>
                    <div class="profile-author__author__description" style="display: inline-block;">
                        <a href="/" class="logo__desc">
                            <h1 style="margin-bottom: 0.2rem;" class="blya">Мегасмак</h1>
                        </a>
                        <ol class="breadcrumb underlogo__desc">
                            <li class="breadcrumb-item"><a href="/" class="hovering">Главная</a></li>
                            <li class="breadcrumb-item active">Корзина</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12" style="position: relative;">
                    <div class="card" style="display: block; width: 100%;">
                        <div class="card-body">
                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents mb-0" style="display:table; align-items: center;-webkit-box-pack: center;justify-content: center;" cellspacing="0">
                                <tr>
                                    <td class="cart-empty woocommerce-info" colspan="5" style="text-align:center;">
                                        Ничего нет</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @else
                <div class="container mt-2 mb-4">
                    <div class="row">
                        <div class="col-12" style="position: relative;">
                            <div style="display: inline-block; overflow: hidden;">
                                <a href="/">
                                    <img class="profile-author__img" width="69" height="69" src="view/img/Megasmuck_logo.jpg">
                                </a>
                            </div>
                            <div class="profile-author__author__description" style="display: inline-block;">
                                <a href="/" class="logo__desc">
                                    <h1 style="margin-bottom: 0.2rem;" class="blya">Мегасмак</h1>
                                </a>
                                <ol class="breadcrumb underlogo__desc">
                                    <li class="breadcrumb-item"><a href="/" class="hovering">Главная</a></li>
                                    <li class="breadcrumb-item active">Корзина</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-lg-7 mt-lg-4 mb-4 mb-lg-0">
                            <div class="tab-content">
                                <article id="post-5" class="post-5 page type-page status-publish hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-notices-wrapper"></div>
                                            <tbody>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form class="woocommerce-cart-form" action="cart" method="post">
                                                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents mb-0" style="display:table; align-items: center;-webkit-box-pack: center;justify-content: center;" cellspacing="0">
                                                                <thead style="font-size: 1.2rem;">
                                                                    <tr style="border-bottom:1px solid gray; font-size: 16px;">
                                                                        <td colspan="2">Товар</td>
                                                                        <td>Цена</td>
                                                                        <td>Количество</td>
                                                                        <td>Всего</td>
                                                                    </tr>
                                                                    @foreach($data as $product)
                                                                    <tr class="woocommerce-cart-form__cart-item cart_item my_items" style="border-bottom:1px solid gray;">
                                                                        <td class="img product-thumbnail" style="padding: 8px 2px;">
                                                                            <div class="card--summary__item">
                                                                                <div class="card--summary__theme-thumb">
                                                                                    <a href="product?id=">
                                                                                        <img src="{{$product['path']}}" width="200" height="150" style="object-fit: fill; border-radius: 20%;" alt="" sizes="(max-width: 400px) 100vw, 400px" class="attachment-smaller_crop size-smaller_crop" alt="{{$product['name']}}">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="product-thumbnail" style="">
                                                                            <h5><a href="product?id=" class="name">{{$product['name']}}</a></h5>
                                                                            <a href="#" id="product{{$product['name']}}" name="quantity-{{$product['name']}}" value="{{$product['quantity']}}" class="remove">Удалить</a>
                                                                        </td>
                                                                        <td class="price" style="font-size: 15px; color: #2C2C2C;">
                                                                            {{$product['price']}} &#8381;
                                                                        </td>
                                                                        <td class="quantity">
                                                                            <input type="number" class="itemQty" id="product{{$product['name']}}" name="quantity-{{$product['name']}}" value="{{$product['quantity']}}" min="1" max="{{$product['max']}}" placeholder="Quantity" step="1" required>
                                                                        </td>
                                                                        <td class="price" style="font-size: 15px; color: #2C2C2C;">
                                                                            {{$product['price'] * $product['quantity']}} &#8381;
                                                                        </td>
                                                                        <td id="{{$product['name']}}" class="itemPrice" style="display: none;">{{$product['price']}}</td>
                                                                    </tr>
                                                                    @endforeach
                                            </tbody>
                                            </table>
                                            <div class="subtotal" style="line-height: 40px; text-align: center;">
                                                <span class="text" style="font-size: 15px; color: #2C2C2C; display: inline-block; vertical-align: middle; line-height: normal;">Подытог</span>
                                                <span class="price" id="totalPrice321" style="font-size: 15px; color: #2C2C2C; display: inline-block; vertical-align: middle; line-height: normal;">

                                                    &#8381;
                                                </span>
                                            </div>
                                            <div class="buttons" style="text-align: center;">
                                                <input type="submit" id="123" value="Обновить" name="update" class="btn btn-block btn-lg btn-brand alt wc-forward">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-5 ml-auto mb-lg-0 mb-3 order-2 mt-lg-4">
                    <div class="ml-0 ml-lg-4 card card--summary">
                        <div class="card-body">
                            <div class="cart_totals">
                                <table cellspacing="0" class="shop_table shop_table_responsive" style=" width:  100%; border-spacing: 0;">
                                    <tbody>
                                        <tr class="order-total" style="padding-bottom: 50px;">
                                            <th class="order-total" style="width: 50%; vertical-align: top;">Количество
                                                товаров:</th>
                                            <td data-title="Total" id="totalQuant" class="order-total" style="text-align: right;">
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th class="order-total" style="width: 50%; vertical-align: top;">Всего:
                                            </th>
                                            <td data-title="Total" id="totalPrice123" class="order-total" style="text-align: right;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="buttons wc-proceed-to-checkout" style="text-align: center;">
                                    <a href="cart?purchase=1" class="btn btn-lg btn-block btn-brand alt wc-forward huge">К оплате</a>
                                </div>
                            </div>
                            <small class="text-center mt-3 d-block"><strong>100% гарантия</strong><br><span class="text-gray-soft">Мы вернём вам деньги (нет)</span></small>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('/js/shopCookie.js') }}"></script>
<script src="{{ asset('/js/remove.js') }}"></script>
@endsection