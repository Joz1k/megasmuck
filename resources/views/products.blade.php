@extends('layout')

@section('content')
<div class="section-main mt-4">
    <div class="container" role="main">
    <section>
        <div class="row">
            <div class="col-xs-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <form action="{{ route('products.search') }}" method="GET" class="form-main  form-inline nofloat-xs pull-right pull-left-sm aligning">
                    <div class="form-group form-input-fields form-group-lg has-feedback">
                        <label class="sr-only" for="search">Поиск</label>
                        <div class="input-group">
                        <input type="text" class="form-control input-search" name="search" id="search" placeholder="Поиск">
                        <span class="input-group-addon group-icon"><span class="glyphicon glyphicon-user"></span>
                        </span>
                        <button type="submit" class="btn btn-submit" id="b">
                        <span class="border-0" id="search-addon">
                        <i class="fas fa-search"></i></span>
                        </button>
                        </div>
                    </div>
                </form>
                <div id="display" class="findings"></div>
            </div>
        </div>
    </section>
    <section class="mt-4" id="LoadMoreButton">
        <div class="card-group" style="padding-bottom: 45px;" id="load_data">
            <!-- @if ($products)
                @foreach ($products as $product)
                <div class="row row-cols-1 g-4">
                    <div class="col">
                        <div class="card mt-5" style="width:300px; height:26rem;">
                            <div class="wrapper exmpl"><img class="card-img-top img-fluid" src="{{$product->path}}" alt="{{$product->name}}"></div>
                            <div class="card-body">
                                <h4 class="card-title mb-2">{{$product->id}} {{$product->name}}</h4>
                                <div class="d-flex justify-content-between align-items-center pb-2 mt-5">
                                @if ($product->discount > 0)
                                <h5 class="card-text"> {{$product->discount}}&#8381;</h5>
                                <span class="rrp" style="text-decoration: line-through;">{{$product->price}}&#8381;</span>
                                @else
                                <h5 class="card-text"> {{$product->price}} &#8381;</h5>
                                @endif
                                <a href="{{route('show.post', $product->id)}}" class="btn btn-primary" style="background-color: #50B946 !important;
                                border-color: #50B946 !important;" type="submit"> В корзину </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif -->
            </section>
            <div class="container mt-5" style="max-width: 550px">
        <div class="auto-load text-center">
        </div>
        </div>
    </div>
</div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script type="text/javascript">
        var ENDPOINT = "{{ url('/products') }}";
        var page = 1;
        infinteLoadMore(page);
        console.log(page);
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                infinteLoadMore(page);
                console.log(page);
            }
        });
        function infinteLoadMore(page) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                    url: ENDPOINT + "?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function () {
                        $('.auto-load').show();
                    }
                })
                .done(function (response) {
                    console.log(response);
                    if (response.length == 0) {

                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
                    $('.auto-load').hide();
                    $("#load_data").append(response);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {

                    console.log('Server error occured');
                });
        }
    </script>
    </section>
</div>
</div>

<!--
<script src="view/js/main.js"></script>

<script src="view/js/else.js"></script>


<script type="text/javascript">
$(document).ready(function() {

    $("#search").keyup(function() {

    var name = $('#search').val();
    console.log(name);
     if (name === "") {
         $("#display").html("");
     } else {
         $.ajax({
             type: "POST",
             url: "view/ajax/SearchController.php",
             data: {
                 search: name
             },
             success: function(response) {
                 $("#display").html(response).show();
             }
        });
    }
    });
});
function fill(Value) {
$('#search').val(Value);
$('#display').hide();
}
</script> -->
@endsection