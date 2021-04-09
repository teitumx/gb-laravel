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
                 <label for="category">Категория</label>
                 <select class="form-control" id="category" name="category_id">
                     <option value="0">Выбрать категорию</option>
                 </select>
             </div>

            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}">
            </div>

            <div class="form-group">
                <label for="description">Новость</label>
                <textarea name="description" id="description" class="form-control">{!! old('description') !!}</textarea>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Добавить</button>
            <br>

        </form>
        </div>
    </div>
@endsection
