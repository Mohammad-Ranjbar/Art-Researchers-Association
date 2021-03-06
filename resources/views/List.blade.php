@extends('layouts.app')
@section('styles')

@endsection
@section ('content')
    <main role="main">

        <section class="jumbotron text-center ">
            <div class="container">
                <h1 class="jumbotron-heading mt-3">دسته بندی کتب</h1>
                <p class="lead " align="justify">
                    وقتی می‌خواهیم به دوستی کتاب هدیه بدهیم معمولا به این فکر می‌کنیم که چه نوع کتاب‌هایی را بیشتر می‌خواند یا
                    ممکن است بپسندد. این پرسش، در واقع سوالی راجع به ژانر مورد علاقه‌ی او است. ژانر کتاب در ساده‌ترین حالت، قالبی
                    را مشخص می‌کند که کتاب در آن قرار می‌گیرد. هر رمان در دسته‌ای مشخص با ویژگی‌هایی ملموس طبقه بندی می‌شود. در
                    طول تاریخ چیدمان قفسه‌ی کتابخانه‌ها بر اساس همین قالب‌ها بوده و در کتابخانه‌های بزرگ به زیرژانرها هم توجه
                    می‌شود. خواننده‌ی پیگیر رمان به راحتی می‌تواند این طبقه بندی را درباره‌ی کتاب‌هایی که خوانده است انجام دهد و
                    احتمالا برایش سخت نباشد ژانر مورد علاقه‌ی خود را انتخاب کند. در این مطلب به طور خلاصه به معرفی انواع ژانرهای
                    مختلف و نمونه‌هایی از هر کدام می‌پردازیم تا با آگاهی کامل‌تری به دسته بندی کتاب‌ها توجه کنیم و شاید هم مطلع
                    شویم نویسنده‌ی محبوب‌مان در کدام قالب پررنگ‌تر عمل کرده است. محبوب‌ترین نویسندگان، نویسنده‌های ژانر هستند و
                    خوانندگان عموما به این دسته بندی‌ها اهمیت می‌دهند.
                </p>

                <!-- Trigger the modal with a button -->
                @if (auth()->check())
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                        اضافه کردن دسته
                    </button>
            @endif

            <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <form action="/list/store" method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">نام دسته</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="نام دسته"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">توضیحات دسته</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                               placeholder="توضیحات دسته" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">تصویر دسته </label>
                                        <input type="file" class="form-control" name="image" id="image" required>
                                    </div>
                                    {!! htmlFormSnippet() !!}
                                    <button type="submit" class="btn btn-primary">تایید</button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>

        <div class="album py-5 ">
            <div class="container">

                <div class="row">
                    @foreach($lists as $list)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow ">
                                <img class="card-img-top" src="/list-image/{{$list->image}}" alt="Card image cap">
                                <div class="card-body" align="right">

                                    <h3 dir="rtl" align="right">{{$list->name}}</h3>
                                    <p class="card-text">{{$list->description}}</p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="/listBook/{{$list->id}}">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" disabled>Edit</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                @php
                    $link_limit = 6;
                @endphp
                @if ($lists->lastPage() > 1)
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination">
                                <li class="{{ ($lists->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a href="{{ $lists->url(1) }}">First</a>
                                </li>
                                @for ($i = 1; $i <= $lists->lastPage(); $i++)
                                    <?php
                                    $half_total_links = floor($link_limit / 2);
                                    $from = $lists->currentPage() - $half_total_links;
                                    $to = $lists->currentPage() + $half_total_links;
                                    if ($lists->currentPage() < $half_total_links) {
                                        $to += $half_total_links - $lists->currentPage();
                                    }
                                    if ($lists->lastPage() - $lists->currentPage() < $half_total_links) {
                                        $from -= $half_total_links - ($lists->lastPage() - $lists->currentPage()) - 1;
                                    }
                                    ?>
                                    @if ($from < $i && $i < $to)
                                        <li class="{{ ($lists->currentPage() == $i) ? ' active' : '' }}">
                                            <a href="{{ $lists->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endif
                                @endfor
                                <li class="{{ ($lists->currentPage() == $lists->lastPage()) ? ' disabled' : '' }}">
                                    <a href="{{ $lists->url($lists->lastPage()) }}">Last</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                @endif
            </div>
        </div>

    </main>
@endsection
