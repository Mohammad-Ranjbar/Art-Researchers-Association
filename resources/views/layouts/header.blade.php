<header style="font-size: large">
    <nav class=" navbar" style="background-color: #000000" dir="rtl">

        <ul class="nav justify-content-end">
            @if (auth()->check())
                <li class="nav-item active">
                    <div class="dropdown  float-right ">
                        <img class="dropdown-toggle" src="/user/{{auth()->user()->image}}"
                             style="height: 50px ; width: 50px ; border-radius: 50px;"
                             data-toggle="dropdown">
                        @if (auth()->user()->notifications->whereNull('read_at')->count() >=1)
                            <span class="badge badge-light">
                            {{auth()->user()->notifications->whereNull('read_at')->count() }}
                             </span>
                        @endif

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item " href="/profile">پروفایل </a>
                            @if (auth()->user()->notifications->whereNull('read_at')->count() >= 1 )
                                <ul>

                                    @foreach (auth()->user()->notifications->whereNull('read_at') as $notification)
                                        <li class="dropdown-item">
                                            {{$notification->data['message']}}
                                            {{$notification->markAsRead()}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
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
