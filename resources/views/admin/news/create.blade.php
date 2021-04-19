@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-8 offset-2">

            <h2>Добавить новость</h2>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>

                @endforeach

            @endif

        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
             <div class="form-group">
                 <label for="category_id">Категория</label>
                 <select class="form-control" id="category_id" name="category_id">
                     @foreach($category as $categoryItem)
                         <option id="category_id" name="category_id" value="{{ $categoryItem->id }}">{{ $categoryItem->title }}</option>

                     @endforeach


                 </select>
             </div>

            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" value=" {{ old('slug') }}">

            </div>

            <div class="form-group">
                <label for="status">Статус</label>
            <select class="form-control" id="status" name="status">
                <option value="draft">Черновик</option>>
                <option value="published">Опубликовано</option>>
                <option value="blocked">Заблокировано</option>>
            </select>
            </div>

            <div class="form-group">
                <label for="description">Новость</label>
                <textarea name="newstext" id="newstext" class="form-control">{!! old('newstext') !!}</textarea>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Добавить</button>
            <br>

        </form>
        </div>
    </div>
@endsection
