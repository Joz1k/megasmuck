@extends('layout')

@section('content')
<main class="main site-main">
  <div class="d-flex" id="wrapper">
    @include('profile.sidebar')
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-2" style="margin-left: 0% !important;">
                <div class="main-body">

                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="/profile">Пользователь</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Заказы</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3" style="left: 20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3" style="width: 75%; margin-bottom: 30px;">
                            <h6 class="mb-0">Мои заказы</h6>
                        </div>
                        <div class="accordion">
                            <div class="accordion-content">
                                <header>
                                    <span class="title">Заказ №123</span>
                                    <i class="fa-light fa-plus"></i>
                                </header>
                                <div class="description">
                                    Товар - 1 dsad Товар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1
                                    dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1
                                    dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1
                                    dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1
                                    dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsadТовар - 1 dsad
                                </div>
                            </div>
                            <div class="accordion-content">
                                <header>
                                    <span class="title">Заказ №123</span>
                                    <i class="fa-light fa-plus"></i>
                                </header>
                                <div class="description">
                                    Товар - 2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
      </div>
</main>
<script src="{{ asset('/js/orders.js') }}"></script>
@endsection