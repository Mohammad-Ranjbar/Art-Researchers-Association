@extends('layouts.app')
@section ('content')

    <body dir="rtl">
        <div class="container-fluid" align="right">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar ">
                    <div class="sidebar-sticky m-3" style="height: 600px">
                        <ul class="nav flex-column ">
                            <li class="nav-item ">
                                <a class="nav-link " href="/dashboard">
                                    <span data-feather="home" class="mx-2"></span>
                                    داشبورد
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/notifications">
                                    <span data-feather="home" class="mx-2"></span>
                                    اعلانات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/posts">
                                    <span data-feather="file" class="mx-2"></span>
                                    پست های انجمن
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/comments">
                                    <span data-feather="shopping-cart" class="mx-2"></span>
                                    کامنت های شما
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/userEdit">
                                    <span data-feather="users" class="mx-2"></span>
                                    ویرایش اطلاعات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/createPost">
                                    <span data-feather="bar-chart-2" class="mx-2"></span>
                                    ایجاد پست انجمن
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="emailAdmin">
                                    <span data-feather="layers" class="mx-2"></span>
                                    پیام به مدیر
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="favoriteBook">
                                    <span data-feather="layers" class="mx-2"></span>
                                   کتاب های مورد علاقه
                                </a>
                            </li>
                        </ul>

                        {{--                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
                        {{--                            <span>Saved reports</span>--}}
                        {{--                            <a class="d-flex align-items-center text-muted" href="#">--}}
                        {{--                                <span data-feather="plus-circle"></span>--}}
                        {{--                            </a>--}}
                        {{--                        </h6>--}}
                        {{--                        <ul class="nav flex-column mb-2">--}}
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link" href="#">--}}
                        {{--                                    <span data-feather="file-text"></span>--}}
                        {{--                                    Current month--}}
                        {{--                                </a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link" href="#">--}}
                        {{--                                    <span data-feather="file-text"></span>--}}
                        {{--                                    Last quarter--}}
                        {{--                                </a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link" href="#">--}}
                        {{--                                    <span data-feather="file-text"></span>--}}
                        {{--                                    Social engagement--}}
                        {{--                                </a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link" href="#">--}}
                        {{--                                    <span data-feather="file-text"></span>--}}
                        {{--                                    Year-end sale--}}
                        {{--                                </a>--}}
                        {{--                            </li>--}}
                        {{--                        </ul>--}}
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @yield ('body')
                </main>
            </div>
        </div>
    </body>
@endsection
