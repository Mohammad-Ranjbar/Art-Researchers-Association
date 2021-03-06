@extends('layouts.app')

@section('content')

    <div id="demo" class="carousel slide" data-ride="carousel" dir="ltr">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        @if ($news->first())

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="/news-image/{{$news->first()->image}}" width="100%" height="500">
                    <div class="carousel-caption">
                        <h3 style="background-color: #b0d4f1">{{$news->first()->title}}</h3>
                    </div>
                </div>
                @foreach ($news->except($news->first()->id) as $new)

                    <div class="carousel-item">
                        <img src="/news-image/{{$new->image}}" width="100%" height="500">
                        <div class="carousel-caption">
                            <h3 style="background-color: #b0d4f1">{{$new->title}}</h3>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
    <h3><a href="{{route('temp','1')}}">لینک موقت شما</a></h3>
    <div class="container marketing mt-4">

        <h1 class="mb-4" align="center">جدید ترین کتاب ها</h1>
        <i class="fas fa-chevron-circle-right next" ></i>
        <i class="fas fa-chevron-circle-left prev"></i>
        <div class="row p-3 man border border-dark " dir="ltr" align="center">

                @foreach($books as $book)

                    <div class="col-md-12 " align="center">
                        <img class="card-img-top" src="/book-image/{{$book->image}}" width="140"
                             height="300">
                        <h2 class="mt-1">{{$book->name}}</h2>
                        <p>{{$book->description}}</p>

                        <p><a class="btn btn-secondary" href="/showBook/{{$book->id}}" role="button">مشاهده این کتاب</a></p>
                    </div>

                @endforeach

        </div>

        <!-- START THE FEATURETTES -->
        <h1 class="my-4 border-top" align="center">جدید ترین گفتگو ها</h1>

        @foreach ($forums as $forum)
            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-5 border " align="center">
                    <img class="featurette-image img-fluid mx-auto rounded-circle" src="/user/{{$forum->user->image}}"
                         style="height: 100px;width: 200px">
                </div>
                <div class="col-md-7" align="center">
                    <h2 class="featurette-heading">{{$forum->title}}  </h2>
                    <p class="lead">{{Str::limit($forum->body,50)}}</p>
                </div>
            </div>
        @endforeach
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <script>
	    $(document).ready(() =>
		    $('.man').slick({
                arrow:true,
			    slidesToShow: 3,
			    slidesToScroll: 3,
			    dots: true,
			    autoplay: true,
			    speed: 300,
                prevArrow: $('.prev'),
			    nextArrow: $('.next'),
		    }),
	    );
    </script>


@endsection
