@extends('layouts.main')

@section('content')
    <h2> {{ $news->title }}</h2>
    <p> {{ $news->newstext }}</p>
    <h5> Автор: <em>{{ $news->author }}</em></h5>
    <h6>{{ $news->created_at ?? now() }}</h6>
@endsection
