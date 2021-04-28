@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-8 offset-2">

            <h2>Добавить категорию</h2>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>

                @endforeach

            @endif

            <form method="post" action="{{ route('admin.categories.store') }}">
                @csrf

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control">{!! old('description') !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="is_visible">Отображение</label>
                    <input type="checkbox" id="is_visible" name="is_visible" value="1">
                         @if ( boolval(old('is_visible')) === true )" checked @endif
                </div>

                <br>

                <button type="submit" class="btn btn-success">Добавить</button>
                <br>

            </form>
        </div>
    </div>
@endsection
