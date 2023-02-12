@extends('layout')

@section('content')
<section class="product-form">
   <div class="container">
      <div class="translate">

         <form action="{{ route('create.post') }}" method="POST" id="addprod" enctype="multipart/form-data">
            @csrf
            <h3>Информация о товаре</h3>

            <p>Название товара <span>*</span></p>
            <input type="text" name="name" placeholder="Введите название" required maxlength="200" class="box">

            <p>Описание<span>*</span></p>
            <input type="text" name="description" placeholder="Описание" required maxlength="2000" class="box">

            <p>Цена товара <span>*</span></p>
            <input type="number" name="price" placeholder="Введите цену" required min="0" max="99999" maxlength="10" step=".01" class="box">

            <p>Количество <span>*</span></p>
            <input type="number" name="quantity" placeholder="Введите количество" required min="0" max="999" maxlength="10" class="box">

            <p>Картинка <span>*</span></p>
            <label class="uploadFile">
               <i class="fas fa-paperclip fa-md mr-2"></i>
               <span class="filename">Attachment</span>
               <input type="file" name="image" required accept="image/png, image/jpeg" class="box inputfile form-control">
            </label>
            <p><span></span></p>
            <input type="submit" class="btn btn-brand" name="add" value="добавить товар">
         </form>
      </div>
   </div>
</section>
@endsection