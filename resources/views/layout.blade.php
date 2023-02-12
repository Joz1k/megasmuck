<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>MEGASMUCK</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/22831aa9f8.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
  <script src="https://leanmodal.finelysliced.com.au/js/jquery.leanModal.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"></script>


</head>

<body>

  <header class="header">
    <div class="row">
      <div class="header__inner">
        <div class="ml-auto col-lg-9">
          <nav class="topnav">
            <a href="{{ route('main') }}" class="header__sign selected" style="height: 50px;">MEGASMUCK</a>
            <a href="{{ route('main') }}" style="height: 50px;" class="topnav__link selected">Главная</a>
            <a href="discount" style="height: 50px;" class="topnav__link selected">Скидки</a>
            <a href="support" style="height: 50px;" class="topnav__link selected">Поддержка</a>
            @auth
            <a href="{{ route('addProduct') }}" style="height: 50px;" class="topnav__link selected">Добавить</a>
            <a href="{{ route('admin-main') }}" style="height: 50px;" class="topnav__link selected">Админка</a>
            @endif
          </nav>
        </div>

          @auth
          <a id="blankId" href="{{ route('profile') }}" class="btn" style="--bs-btn-padding-y: 0.25rem !important; background-color: #2C9928;"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
          <a id="blankId" href="{{ route('logout') }}" class="btn" style="--bs-btn-padding-y: 0.25rem !important; background-color: #2C9928;">Выйти</a>
          @else
          <a id="modal_trigger" href="#modal" class="btn" style="--bs-btn-padding-y: 0.25rem !important;"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
          @endauth
          <div class="" id="forContainer">
          <div id="modal" class="popupContainer" style="display:none;">
            <div class="cotn_principal">
              <div class="cont_centrar">
                <div class="cont_login">
                  <div class="cont_info_log_sign_up">
                    <div class="col_md_login">
                      <div class="cont_ba_opcitiy">
                        <h2>Войти</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn_login" onclick="cambiar_login()">Войти</button>
                      </div>
                    </div>
                    <div class="col_md_sign_up">
                      <div class="cont_ba_opcitiy">
                        <h2>Регистрация</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn_sign_up" onclick="cambiar_sign_up()">Регистрация</button>
                      </div>
                    </div>
                  </div>
                  <div class="cont_back_info">
                    <div class="cont_img_back_grey">
                      <img
                        src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d"
                        alt="" />
                    </div>

                  </div>
                  <div class="cont_forms">
                    <div class="cont_img_back_">
                      <img
                        src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d"
                        alt="" />
                    </div>
                    <div class="cont_form_login">
                      <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                      <h2>Войти</h2>
                      <form action="{{ route('login.post') }}" method="post" class="formating">
                      @csrf
                        <input type="name" placeholder="name" name="name" required value="Johnny1" />
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <input type="password" placeholder="Password" name="password" required value="Qwerty123" />
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <div class="checkbox">
                            <label>
                                <a href="{{ route('reset.password.get') }}">Reset Password</a>
                            </label>
                        </div>
                        <button class="btn_login" value="Sign In" name="SignIn" type="submit">Войти</button>
                      </form>
                    </div>

                    <div class="cont_form_sign_up">
                      <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                      <h2 style="margin-right: 40px;">Регистрация</h2>
                      <form action="{{ route('register.post') }}" method="post" class="formating">
                      @csrf
                        <input type="email" placeholder="Email" name="email" required />
                        @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                        <input type="text" placeholder="Username" name="name" required autofocus/>
                        @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                        <input type="password" placeholder="Password" name="password" required />
                        @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                        <button class="btn_sign_up" name="SignUp" type="submit">Регистрация</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-lg-1">
        <a class="btn btn-brand btn-sm navbar-btn" href="cart"><i class="fas fa-shopping-cart"></i><span
            class="navbar__btn-quantity mr-1"> 0
          </span></a></div>
        <div class="ml-auto col-lg-1">
          <a href="{{route('cart')}}" class="topnav__btn">Корзина</a>
        </div>
      </div>
    </div>
  </header>


@yield('content')

<footer
          class="text-center text-lg-start text-dark"
          style="background-color: #ECEFF1"
          >
    <section
             class="d-flex justify-content-between p-4 text-white"
             style="background-color: #2C9928"
             >
      <div class="me-5">
        <span>Свяжитесь с нами: </span>
      </div>
      <div>
        <a href="" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-github"></i>
        </a>
      </div>
    </section>
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold">Мегасмак</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
               Lorem ipsum dolor sit amet, consectetur adipisicing
              elit.
            </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold">Товары</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-dark">Коты</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Собаки</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Люди</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Другое</a>
            </p>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold">Полезные ссылки</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-dark">Аккаунт</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Главная</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Скидки</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Поддержка</a>
            </p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

            <h6 class="text-uppercase fw-bold">Контакты</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p><i class="fas fa-home mr-3"></i> Санкт-Петербург, ул. Пушкина, д. 13</p>
            <p><i class="fas fa-envelope mr-3"></i> email@example.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          </div>
        </div>
      </div>
    </section>
  </footer>
</body>
</html>
<script src="{{ asset('/js/modal.js') }}"></script>
<script src="{{ asset('/js/logreg.js') }}"></script>