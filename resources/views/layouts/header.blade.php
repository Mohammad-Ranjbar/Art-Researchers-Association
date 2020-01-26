<header style="font-size: large">
    <nav class=" navbar  navbar-dark fixed-top bg-dark">

        <ul class="nav justify-content-end">
            @if (auth()->check())

                <li class="nav-item active">
                    <div class="dropdown  float-right " >
                        <img class="dropdown-toggle" src="{{auth()->user()->image}}" style="height: 50px ; width: 50px ; border-radius: 50px;"
                             data-toggle="dropdown" data-hover="dropdown">
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">پروفایل </a>

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
                <a class="nav-link" href="/listBook">لیست موضوعی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">انجمن</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">اخبار</a>
            </li>
        </ul>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="/">انجمن پژوهشگران هنر </a>
            </li>

        </ul>

        <ul class="nav ">
            <li class="nav-item">
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="جستجو ..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">جستجو</button>
                </form>

            </li>

        </ul>

    </nav>
</header>
