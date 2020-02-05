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
                <img src="/news-image/{{$news->first()->image}}"  width="100%" height="500">
                <div class="carousel-caption">
                    <h3 style="background-color: #b0d4f1">{{$news->first()->title}}</h3>
                </div>
            </div>
            @foreach ($news->except($news->first()->id) as $new)

            <div class="carousel-item">
                <img src="/news-image/{{$new->image}}"  width="100%" height="500">
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

    <div class="container marketing mt-4">
        <!-- Three columns of text below the carousel -->
            <h1 class="mb-4" align="center">جدید ترین کتاب ها</h1>
        <div class="row">
            @foreach($books as $book)
            <div class="col-4  " align="center">
                <img class="rounded-circle" src="/book-image/{{$book->image}}" alt="Generic placeholder image" width="140" height="140">
                <h2 class="mt-1">{{$book->name}}</h2>
                <p>{{$book->description}}</p>

                <p ><a class="btn btn-secondary" href="/showBook/{{$book->id}}" role="button">مشاهده این کتاب</a></p>

            </div><!-- /.col-lg-4 -->
          @endforeach
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->
        <h1 class="my-4 border-top" align="center">جدید ترین گفتگو ها</h1>
        @foreach ($forums as $forum)
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-5 border " align="center">
                <img class="featurette-image img-fluid mx-auto rounded-circle" src="/user/{{$forum->user->image}}" style="height: 100px;width: 200px">
            </div>
            <div class="col-md-7" align="center">
                <h2 class="featurette-heading">{{$forum->title}}  </h2>
                <p class="lead">{{Str::limit($forum->body,50)}}</p>
            </div>
        </div>
        @endforeach

    </div>

@endsection
