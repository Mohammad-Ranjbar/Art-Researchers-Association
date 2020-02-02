@extends('layouts.app')
@section ('content')
    <section class="jumbotron text-center ">
        <div class="container">
            <h1 class="jumbotron-heading mt-3">لورم ایپسوم</h1>
            <p class="lead text-muted">
                لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی
                گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل
                ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن
                باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری
                یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد
                و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه
                رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات
                ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.
            </p>

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">اضافه کردن دسته
            </button>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card" align="right">
                    <img class="card-img-top" src="/1.jpg" alt="">
                    <div class="card-body">
                        <h2>عنوان</h2>
                     {{ Str::limit(  'Lorem ipsum dolor sit amet, consectetu adipisicing elit. Assumenda beatae corporis deserunt eligendi exercitationem, fugit non perspiciatis qui quibusdam ratione, similique soluta suscipit tempore? A doloribus ex reprehenderit sapiente vero!',200)}}
                            <a href="#">
                        <button class="btn btn-success ">
                                بیشتر
                        </button>
                            </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card" align="right">
                    <img class="card-img-top" src="/1.jpg" alt="">
                    <div class="card-body">
                        <h2>عنوان</h2>
                     {{ Str::limit(  'Lorem ipsum dolor sit amet, consectetu adipisicing elit. Assumenda beatae corporis deserunt eligendi exercitationem, fugit non perspiciatis qui quibusdam ratione, similique soluta suscipit tempore? A doloribus ex reprehenderit sapiente vero!',200)}}
                            <a href="#">
                        <button class="btn btn-success ">
                                بیشتر
                        </button>
                            </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card" align="right">
                    <img class="card-img-top" src="/1.jpg" alt="">
                    <div class="card-body">
                        <h2>عنوان</h2>
                     {{ Str::limit(  'Lorem ipsum dolor sit amet, consectetu adipisicing elit. Assumenda beatae corporis deserunt eligendi exercitationem, fugit non perspiciatis qui quibusdam ratione, similique soluta suscipit tempore? A doloribus ex reprehenderit sapiente vero!',200)}}
                            <a href="#">
                        <button class="btn btn-success ">
                                بیشتر
                        </button>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
