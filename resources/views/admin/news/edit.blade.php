@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-8 offset-2">

            <h2>Редактировать новость</h2>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>

                @endforeach

            @endif

            <form method="post" enctype="multipart/form-data" action="{{ route('admin.news.update', ['news'=>$news]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach($category as $categoryItem)
                            <option id="category_id" name="category_id" value="{{ $categoryItem->id }}"
                            @if($categoryItem->id === $news->category_id) selected @endif
                            >{{ $categoryItem->title }}</option>

                        @endforeach


                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $news->title }}">
                </div>

                <div class="form-group">
                    <label for="author">Автор</label>
                    <input type="text" id="author" name="author" class="form-control" value="{{ $news->author }}">
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value=" {{ $news->slug }}">

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
                    <label for="img">Изображение</label>
                    <img src=" {{ \Storage::disk('public')->url($news->img) }}" style="width: 200px" alt="">
                    <input type="file" id="img" name="img" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Новость</label>
                    <textarea name="newstext" id="newstext" class="form-control">{!! $news->newstext !!}</textarea>
                </div>

                <br>

                <button type="submit" class="btn btn-success">Изменить</button>
                <br>

            </form>
        </div>
    </div>

{{--    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#newstext' ) )--}}
{{--            .then( editor => {--}}
{{--                console.log( editor );--}}
{{--            } )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('newstext', options);
    </script>

@endsection

{{--@push('js')--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#newstext' ) )--}}
{{--            .then( editor => {--}}
{{--                console.log( editor );--}}
{{--            } )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}
{{--@endpush--}}
