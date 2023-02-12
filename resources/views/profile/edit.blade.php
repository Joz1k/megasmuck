@extends('layout')

@section('content')
<main class="main site-main">
  <div class="d-flex" id="wrapper">
    @include('profile.sidebar')
    <div class="container-fluid">
      <div class="container mt-2" style="margin-left: 0% !important;">
        <div class="main-body">

          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('profile') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('profile') }}">Пользователь</a></li>
              <li class="breadcrumb-item active" aria-current="page">Профиль пользователя</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="card mb-3" style="left: 20px;">
        <!-- <form id="formAccountSettings" method="POST" action="" enctype="multipart/form-data" class="is-readonly needs-validation" role="form" novalidate>
          @csrf
          @method('patch')
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <label for="name" class="mb-0 form-label">Логин</label>
                </div>
                <input class="col-sm-9 form-control is-disabled text-secondary" style="width: 75% !important; padding: 0.1rem 0.75rem !important;" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus="" required disabled>
                <div class="invalid-tooltip">Невозможный логин</div>
            </div>
          <hr>
          <div class="row">
              <div class="col-sm-3">
                <label for="email" class="mb-0 form-label">Email</label>
                </div>
                <input class="form-control is-disabled col-sm-9 text-secondary" style="width: 75% !important; padding: 0.1rem 0.75rem !important;" type="text" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="john.doe@example.com" disabled>
                <div class="invalid-tooltip">Невозможный email</div>
          </div>
          <hr>
          <div class="row">
              <div class="col-sm-3">
                <label for="email" class="mb-0 form-label">Телефон</label>
                </div>
                <input class="form-control is-disabled col-sm-9 text-secondary" style="width: 75% !important; padding: 0.1rem 0.75rem !important;" type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" placeholder="8923****803" disabled>
                <div class="invalid-tooltip">Невозможный телефон</div>

          </div>
          <hr>
          <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-brand button-create me-2 btn-save js-save">Сохранить</button>
              </div>
            </div>
          <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-brand button-create me-2 btn-edit js-edit">Редактировать</button>
              </div>
            </div>
          </div>
          </div>
        </form> -->
        <form id="formAccountSettings" method="POST" action="{{route('users.update-profile')}}" enctype="multipart/form-data" class="is-readonly needs-validation" role="form" novalidate>
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <label for="name" class="mb-0 form-label">Логин</label>
                </div>
                <input class="col-sm-9 form-control is-disabled text-secondary" style="width: 75% !important; padding: 0.1rem 0.75rem !important;" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus="" required>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
          <hr>
          <div class="row">
              <div class="col-sm-3">
                <label for="email" class="mb-0 form-label">Email</label>
                </div>
                <input class="form-control is-disabled col-sm-9 text-secondary" style="width: 75% !important; padding: 0.1rem 0.75rem !important;" type="text" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="john.doe@example.com">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
          </div>
          <hr>
          <div class="row">
              <div class="col-sm-3">
                <label for="email" class="mb-0 form-label">Телефон</label>
                </div>
                <input class="form-control is-disabled col-sm-9 text-secondary" style="width: 75% !important; padding: 0.1rem 0.75rem !important;" type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" placeholder="8923****803">
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-brand button-create me-2">Сохранить</button>
              </div>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
</main>
<!-- <script src="{{ asset('/js/profileEdit.js') }}"></script> -->
@endsection