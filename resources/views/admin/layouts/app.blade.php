<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin-ui/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin-ui/img/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    {{--<link href="{{ asset('admin-ui/css/nucleo-icons.css') }}" rel="stylesheet" />--}}
    {{--<link href="{{ asset('admin-ui/css/nucleo-svg.css') }}" rel="stylesheet" />--}}
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin-ui/css/sweetalert2.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('admin-ui/css/choices.css') }}" rel="stylesheet" />
    {{--<link id="pagestyle" href="{{ asset('admin-ui/css/material-dashboard.css') }}" rel="stylesheet" />--}}
    <link id="pagestyle" href="{{ asset('admin-ui/css/bootstrap.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('admin-ui/css/app.css') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show">


<header class="p-3 border-bottom header">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="{{ asset('admin-ui/img/logo-ct-dark.png') }}" alt="main_logo">
            </a>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>


                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>

            </div>

            <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky mt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex" aria-current="page" href="{{ route('admin.products.categories.index') }}">
                            <span class="material-icons-outlined">
                                home
                            </span>
                            Панель управления
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex active" aria-current="page" href="{{ route('admin.products.categories.index') }}">
                            <span class="material-icons-outlined">
                                format_list_bulleted
                            </span>
                            Категории
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" aria-current="page" href="{{ route('admin.products.categories.index') }}">
                            <span class="material-icons-outlined">
                                business
                            </span>
                            Компании
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" aria-current="page" href="{{ route('admin.products.categories.index') }}">
                            <span class="material-icons-outlined">
                                shopping_cart
                            </span>
                            Товары
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" aria-current="page" href="{{ route('admin.products.categories.index') }}">
                            <span class="material-icons-outlined">
                                rate_review
                            </span>
                            Отзывы
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" aria-current="page" href="{{ route('admin.products.categories.index') }}">
                            <span class="material-icons-outlined">
                                article
                            </span>
                            Блог
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" aria-current="page" href="{{ route('admin.products.categories.index') }}">
                            <span class="material-icons-outlined">
                                people
                            </span>
                            Пользователи
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" aria-current="page" href="{{ route('admin.products.categories.index') }}">
                            <span class="material-icons-outlined">
                                manage_accounts
                            </span>
                            Распределение ролей
                        </a>
                    </li>

                </ul>

                {{--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
                    {{--<span>Saved reports</span>--}}
                    {{--<a class="link-secondary" href="#" aria-label="Add a new report">--}}
                        {{--<span data-feather="plus-circle"></span>--}}
                    {{--</a>--}}
                {{--</h6>--}}
                {{--<ul class="nav flex-column mb-2">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Current month--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Last quarter--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Social engagement--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Year-end sale--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 main-title">@yield('page_title')</h1>
            </div>

            @yield('content')

        </main>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

<script src="{{ asset('admin-ui/js/app.js') }}"></script>

{{--<script>--}}
    {{--var win = navigator.platform.indexOf('Win') > -1;--}}
    {{--if (win && document.querySelector('#sidenav-scrollbar')) {--}}
        {{--var options = {--}}
            {{--damping: '0.5'--}}
        {{--}--}}
        {{--Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);--}}
    {{--}--}}
{{--</script>--}}

@yield('scripts')

@include('admin.inc.notification')

</body>

</html>