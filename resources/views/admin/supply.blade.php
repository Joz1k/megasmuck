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
                            <li class="breadcrumb-item active" aria-current="page">Список товаров</li>
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
                                <div class="col-lg-6">
                                    <!-- <form action="#">
                                            <div class="medical_search_bar">
                                                <div class="form_item">
                                                    <input type="search" name="search" placeholder="Поиск">
                                                </div>
                                                <button type="submit" class="submit_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </form> -->
                                </div>
                                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">Название
                                            </th>
                                            <th class="th-sm">Цена
                                            </th>
                                            <th class="th-sm">Описание
                                            </th>
                                            <th class="th-sm">Количество
                                            </th>
                                            <th class="th-sm">Продано
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data != [])
                                        @foreach ($data as $value)
                                        <tr>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->price}}</td>
                                            <td>{{$value->description}}</td>
                                            <td>{{$value->quantity}}</td>
                                            <td>{{$value->sold ?? 0 }}</td>
                                        </tr>
@endforeach
@endif
                                    <tfoot>
                                        <tr>
                                            <th>Название
                                            </th>
                                            <th>Цена
                                            </th>
                                            <th>Описание
                                            </th>
                                            <th>Количество
                                            </th>
                                            <th>Продано
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('/js/list.js') }}"></script>
                                @endsection