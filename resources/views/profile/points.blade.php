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
                <li class="breadcrumb-item"><a href="{{ route('profile') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('profile') }}">Пользователь</a></li>
                <li class="breadcrumb-item active" aria-current="page">Баллы</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card mb-3" style="left: 20px;">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3" style="width: 75%;
    margin-bottom: 30px;">
                <h6 class="mb-0">Баллы</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                У вас N баллов
              </div>
              <div class="col-sm-9 text-secondary mt-2" style="font-size: smaller;">
                1 балл = 1 рубль
              </div>
              @if ($rating == null)
              <div class="wrapper2">
                <header> Заработайте баллы - оцените работу сервиса </header>
                  <div class="rating-area">
                    <input type="radio" id="star-5" class="star" name="rating" value="5">
                    <label for="star-5" title="Оценка «5»"></label>
                    <input type="radio" id="star-4" class="star" name="rating" value="4">
                    <label for="star-4" title="Оценка «4»"></label>
                    <input type="radio" id="star-3" class="star" name="rating" value="3">
                    <label for="star-3" title="Оценка «3»"></label>
                    <input type="radio" id="star-2" class="star" name="rating" value="2">
                    <label for="star-2" title="Оценка «2»"></label>
                    <input type="radio" id="star-1" class="star" name="rating" value="1">
                    <label for="star-1" title="Оценка «1»"></label>
                  </div>
                <div class="div2">Вы получили 50 баллов за участие в опросе</div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/rating.js') }}" defer></script>
<script src="{{ asset('/js/points.js') }}"></script>
@endsection