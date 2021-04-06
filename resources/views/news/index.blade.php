@extends('layouts.main')

@section('content')
    <h2 class="section-heading text-uppercase">Новости</h2>
    <hr>
@forelse ($newsList as $key => $news)
<div class="newscontainer">
    <div class="trend-entry d-flex">
        <div class="trend-contents">
            <h2><a href="{{route('news.show', ['id' => ++$key])}}">{!! $news !!}</a></h2>
            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
            <div class="post-meta">
                <span class="d-block"><a href="#">Автор</a> in <a href="#">Категория</a></span>
                <span class="date-read">{{ now() }} <span class="mx-1">&bullet;</span></span>
            </div>
        </div>
    </div>
</div>

@empty
    <h1>Новостей нет</h1>
@endforelse


@endsection




