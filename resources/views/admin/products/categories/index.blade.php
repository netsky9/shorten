@extends('admin.layouts.app')
@section('title')
    Категории товаров
@endsection

@section('page_title')
    Категории товаров
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">

            <div class="card mb-4">
                <div class="card-body pb-3">
                    <form method="get" action="{{ route('admin.products.categories.index') }}">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="input-group input-group-dynamic">
                                    <input name="title" class="multisteps-form__input form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)"
                                           placeholder="Название"
                                           @if(isset($_GET['title']))
                                                value="{{ $_GET['title'] }}"
                                           @endif
                                    >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <select name="parent_id" class="form-control" name="parent-category" id="parent-category" placeholder="Родительская категория">
                                    <option value="">Родительская категория</option>
                                    @foreach($parentCategories as $parentCategory)
                                        <option value="{{ $parentCategory->id }}"
                                                @if(isset($_GET['parent_id']) && $_GET['parent_id'] == $parentCategory->id)
                                                selected=""
                                                @endif
                                        >
                                            {{ $parentCategory->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <div class="button-row d-flex">
                                    <a class="btn bg-gradient-dark ms-auto mb-0 js-btn-next d-flex align-items-center btn-clear" href="{{ route('admin.products.categories.index') }}">
                                        <span class="material-icons-outlined">
                                            clear
                                        </span>
                                        Очистить
                                    </a>
                                    <input class="btn btn-primary mb-0 js-btn-next btn-filter" type="submit" title="Фильтр" value="Фильтр">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card">

                <div class="card-body px-0 pb-0 pt-0">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 table-striped table-sm">
                            <thead>
                            <tr>
                                <th>
                                    <a href="{{ route('admin.products.categories.index',
                                                array_merge($_GET, [
                                                    'sort' => 'title',
                                                    'order' => (isset($_GET['order']) && $_GET['order'] == 'asc') ? 'desc' : 'asc' ])
                                                )}}">
                                        Название
                                    </a>
                                </th>
                                <th>Родительская категория</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.products.categories.edit', $category->id) }}">
                                            {{ $category->title }}
                                        </a>
                                    </td>
                                    <td class="align-middle text-sm">
                                        {{ $category->parentTitle }}
                                    </td>
                                    <td class="align-middle">
                                        <div class="ms-auto d-flex justify-content-end">
                                            <a class="btn-edit"
                                               href="{{ route('admin.products.categories.edit', $category->id) }}">
                                                <span class="material-icons-outlined">edit</span>
                                            </a>
                                            <span class="btn-delete text-danger"
                                                onclick="deleteConfirm('{{ route('admin.products.categories.destroy', $category->id) }}')">
                                                <span class="material-icons-outlined">clear</span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{ $categories->links('vendor.pagination.bootstrap-4') }}

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        if (document.getElementById('parent-category')) {
            var category = document.getElementById('parent-category');
            const parentСategory = new Choices(category, {
                shouldSort: false,
                noResultsText: 'Не найдено',
                itemSelectText: '',
            });
        }
    </script>
@endsection