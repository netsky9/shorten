@extends('admin.layouts.app')
@section('title')
    {{ $category->title }}
@endsection


@section('page_title')
    Редактирование категории "{{ $category->title }}"
@endsection

@section('content')
    <a class="link-back mb-3" href="{{ route('admin.products.categories.index') }}">
        <span class="material-icons-outlined">
        arrow_back_ios
        </span>
        Вернуться к списку
    </a>
    <form method="post" action="{{ route('admin.products.categories.update', $category->id) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-8">
                <div class="card p-3 mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="" value="{{ $category->title }}" required>

                    <label for="slug" class="form-label">Отображение в url</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="" value="{{ $category->slug }}">

                    @if($category->parent_id != 0)
                        <label for="parent_id" class="form-label">Родительская категория</label>
                        <select name="parent_id" class="form-control" id="parent-category" placeholder="Родительская категория">
                            @foreach($categoryList as $item)
                                <option value="{{ $item->id }}" @if($item->id == $category->parent_id) {{ 'selected' }} @endif>
                                    {{ $item->title }}
                                </option>
                            @endforeach
                        </select>
                    @endif

                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" name="description_html" id="description_html" cols="10" rows="5">{{ $category->description_html }}</textarea>
                </div>
                <div class="card p-3">
                    <label for="slug" class="form-label">SEO Заголовок</label>
                    <input type="text" class="form-control" name="title_seo" id="title_seo" placeholder="" value="{{ $category->title_seo }}">
                    <label for="description" class="form-label">SEO Описание</label>
                    <textarea class="form-control" name="description_seo" id="description_seo" cols="10" rows="5">{{ $category->description_seo }}</textarea>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card p-3 mb-3">
                    <input type="submit" class="btn btn-primary" value="Сохранить">
                </div>
                <ul class="list-group mb-3">
                    @if($category->created_at)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Создано:</h6>
                            </div>
                            <span class="text-muted">{{ $category->created_at }}</span>
                        </li>
                    @endif
                    @if($category->updated_at)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Обновлено:</h6>
                            </div>
                            <span class="text-muted">{{ $category->updated_at }}</span>
                        </li>
                    @endif
                    @if($category->deleted_at)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Удалено:</h6>
                            </div>
                            <span class="text-muted">{{ $category->deleted_at }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        if (document.getElementById('parent-category')) {
            var category = document.getElementById('parent-category');
            const parentСategory = new Choices(category);
        }
    </script>
@endsection