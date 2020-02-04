<header style="font-size: large">
    <nav class=" navbar" style="background-color: #000000">

        <ul class="nav justify-content-end">
            @if (auth()->check())

                <li class="nav-item active">
                    <div class="dropdown  float-right ">
                        <img class="dropdown-toggle" src="/user/{{auth()->user()->image}}"
                             style="height: 50px ; width: 50px ; border-radius: 50px;"
                             data-toggle="dropdown">
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/profile">پروفایل </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('خروج') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>

            @else
                <li class="nav-item active">
                    <a class="nav-link" href="/register">ثبت نام</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/login">ورود</a>
                </li>
            @endif
            <li class="nav-item active">
                <a class="nav-link" href="/list">لیست موضوعی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/forum">انجمن</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/news">اخبار</a>
            </li>
        </ul>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="/">انجمن پژوهشگران هنر </a>
            </li>
        </ul>
        <ul class="nav ">
            <li class="nav-item" id="app">
                <search></search>
            </li>

        </ul>
    </nav>
</header>
