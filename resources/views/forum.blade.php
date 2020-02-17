@extends('layouts.app')
@section ('content')
    <main role="main">

        <section class="jumbotron text-center ">
            <div class="container">
                <h1 class="jumbotron-heading mt-3">انجمن</h1>
                <p class="lead " align="justify">
                    وقتی می‌خواهیم به دوستی کتاب هدیه بدهیم معمولا به این فکر می‌کنیم که چه نوع کتاب‌هایی را بیشتر می‌خواند یا ممکن است بپسندد. این پرس
                    ش، در واقع سوالی راجع به ژانر مورد علاقه‌ی او است. ژانر کتاب در ساده‌ترین حالت، قالبی را مشخص می‌کند که کتاب در آن قرار می‌گیرد. هر رمان در دسته‌ای
                    مشخص با ویژگی‌هایی ملموس طبقه بندی می‌شود. در طول تاریخ چیدمان قفسه‌ی کتابخانه‌ها بر اساس همین قالب‌ها بوده و در کتابخانه‌های بزرگ به زیرژانرها هم توجه می‌شود. خواننده‌ی
                    پیگیر رمان به راحتی می‌تواند این طبقه بندی را درباره‌ی کتاب‌هایی که خوانده است انجام دهد و احتمالا برایش سخت نباشد ژانر مورد علاقه‌ی خود را انتخاب کند. در این مطلب به
                    طور خلاصه به معرفی انواع ژانرهای مختلف و نمونه‌هایی از هر کدام می‌پردازیم تا با آگاهی کامل‌تری به دسته بندی کتاب‌ها توجه کنیم و شاید هم مطلع شویم نویسنده‌ی محبوب‌مان
                    در کدام قالب پررنگ‌تر عمل کرده است. محبوب‌ترین نویسندگان، نویسنده‌های ژانر هستند و خوانندگان عموما به این دسته بندی‌ها اهمیت می‌دهند.
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
                                <form action="/forum" method="post" role="form" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">عنوان</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="متن" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">متن</label> <br>
                                        <textarea name="body" id="body" cols="60" rows="10" required></textarea>
                                    </div>


                                    <button type="submit" class="btn btn-primary">تایید</button>
                                </form>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </section>
    <div class="container" align="right">
        <div class="row">
            @foreach ($forums as $forum)

            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header">
                        <a href="/forum/{{$forum->id}}">
                        {{$forum->title}}
                        </a>
                        <small class="float-left">
                            {{jdate($forum->created_at)->ago()}}
                        </small>
                        <br>
                        <small>
                            {{$forum->user->name}}
                        </small>
                    </div>
                    <div class="card-body">
                        {{ Str::limit( $forum->body ,200)}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    </main>
@endsection
