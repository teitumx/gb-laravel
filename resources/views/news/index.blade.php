@extends('layouts.main')

@section('content')
    <h2 class="section-heading text-uppercase">Новости</h2>
    <hr>
@forelse ($news as $newsItem)

<div class="newscontainer">
    <div class="trend-entry d-flex">
        <div class="trend-contents">
            <h2><a href="{{route('news.show', ['id' => $newsItem->id])}}">{{ $newsItem->title }}</a></h2>
            <div class="timeline-body"><p class="text-muted">{!! $newsItem->newstext !!}</p></div>
            <div class="post-meta">
                <span class="d-block"><a href="#">{{$newsItem->author}}</a> in <a href="#">{{ $newsItem->category_title }}</a></span>
                <span class="date-read">{{ $newsItem->created_at ?? now() }} <span class="mx-1">&bullet;</span></span>
            </div>
        </div>
    </div>
</div>

@empty
    <h1>Новостей нет</h1>
@endforelse


@endsection




