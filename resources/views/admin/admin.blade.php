@extends('layout')

@section('content')
<div class="d-flex" id="wrapper">
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">Основные</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin-main')}}">Обзор</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="/statistics">Статистика</a>
        </div>
        <div class="sidebar-heading border-bottom bg-light">Пользователи</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/user-list">Список</a>
        </div>
        <div class="sidebar-heading border-bottom bg-light">Товары</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="{{route('supply')}}">Список</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/supply">Поставки</a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-2" style="margin-left: 0% !important;">
                <div class="main-body">

                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="/admin">Админ-панель</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Обзор</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content-body" style="min-height: 920px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 col-xxl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header flex-wrap border-0 pb-0 align-items-end">
                                        <div class="mb-3 me-3">
                                            <h5 class="fs-20 text-black font-w500">Золото</h5>
                                            <span class="text-num text-black fs-36 font-w500">$673,412.66</span>
                                        </div>
                                        <div class="dropdown mb-auto">
                                            <a href="" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="">
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="progress default-progress">
                                            <div class="progress-bar bg-gradient-5 progress-animated"
                                                style="width: 50%; height:20px;" role="progressbar">
                                                <span class="sr-only">50% Complete</span>
                                            </div>
                                        </div>
                                        <div class="row mt-4 pt-3">
                                            <div class="col-xl-4 col-xxl-5 col-lg-6">
                                                <div class="row">
                                                    <div class="col-sm-6 col-7">
                                                        <h4 class="card-title">Недельная прибыль</h4>
                                                        <ul id="carders" class="card-list mt-3">
                                                            @foreach ($month as $key => $value)
                                                            <li class="mb-2"><span
                                                                    class="bg-success circle"></span><span
                                                                    class="ms-0 month">{{$key}}</span><span
                                                                    class="text-black fs-18 valuev" id="">{{$value}}</span></li>
                                                           <!--  <li class="mb-2"><span class="bg-danger circle"></span><span
                                                                    class="ms-0">Затраты</span><span
                                                                    class="text-black fs-18">30%</span></li>
                                                            <li class="mb-2"><span class="bg-light circle"></span><span
                                                                    class="ms-0">Неизвестно</span><span
                                                                    class="text-black fs-18">20%</span></li> -->
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6 col-5">
                                                        <div class="chartjs-size-monitor">
                                                            <div class="chartjs-size-monitor-expand">
                                                                <div class=""></div>
                                                            </div>
                                                            <div class="chartjs-size-monitor-shrink">
                                                                <div class=""></div>
                                                            </div>
                                                        </div>
                                                        <canvas id="pieChart"
                                                            style="display: block; width: 168px; height: 169px;"
                                                            width="168" height="169"
                                                            class="chartjs-render-monitor"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-xxl-7 col-lg-6" style="position: relative;">
                                                <div id="line-chart" class="bar-chart" style="min-height: 185px;">
                                                    <canvas id="bar-chart" width="300" height="200"></canvas>
                                                </div>
                                                <div>
                                                    <div class="resize-triggers">
                                                        <div class="expand-trigger">
                                                            <div style="width: 398px; height: 186px;">
                                                            </div>
                                                        </div>
                                                        <div class="contract-trigger"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4 content-middle">
                                                <div id="clock-grids" class="clock-grids wow fadeInUp animated animated"
                                                    data-wow-delay=".5s"
                                                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                                    <div class="clock-heading">
                                                        <h3>Тупа топ часы</h3>
                                                    </div>
                                                    <div class="clock-left">
                                                        <div id="myclock"></div>
                                                    </div>
                                                    <div class="clock-bottom">
                                                        <div class="clock">
                                                            <div id="Date">Воскресенье 22 Января 2023</div>
                                                            <ul>
                                                                <li id="hours">16</li>
                                                                <li id="point">:</li>
                                                                <li id="min">07</li>
                                                                <li id="point">:</li>
                                                                <li id="sec">50</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
</div>
                                <script src="{{ asset('/js/admin.js') }}"></script>
                                <script src="{{ asset('/js/clock.js') }}"></script>
                                @endsection