@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-8 offset-2">

            <h2> Редактирование категории </h2>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>

                @endforeach

            @endif

            <form method="post" action="{{ route('admin.users.update', ['user'=>$user]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="name" id="name" name="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Имя</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>


                <div class="form-group">
                    <label for="is_visible">Роль: </label>
                    <select size="1" name="is_Admin">
                        <option value="1">Администратор</option>
                        <option @if( $user->is_Admin !== true ) selected @endif value="0">Гость</option>

                    </select>
                </div>

                <br>

                <button type="submit" class="btn btn-success">Добавить</button>
                <br>

            </form>
        </div>
    </div>
@endsection
