@extends('layouts.main')

@section('content')
    <h2>Спасибо за Ваше обращение!</h2>

   <p><strong>Имя:</strong> {{$data['name']}}</p>
    <p><strong>E-mail:</strong> {{$data['email']}}</p>
    <p><strong>Телефон:</strong> {{$data['phone']}}</p>
    <p><strong>Ваше сообщение:</strong></p>
    <span> {{$data['message']}}</span>
    <br>
    <br>
    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{route('news')}}">На Главную</a>
@endsection
