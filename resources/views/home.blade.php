@extends('layouts.app')

@section('content')
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/1.jpg"  width="100%" height="500">
                <div class="carousel-caption">
                    <h3>پرونده ادبیات</h3>
                    <p>اندیشه مرگ نجاتمان می دهد</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/2.jpg"  width="100%" height="500">
                <div class="carousel-caption">
                    <h3>زبان و ادبیات فارسی</h3>
                    <p>نهمین همایش ملی زبان و ادبیات پارسی</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/3.jpg"  width="100%" height="500">
                <div class="carousel-caption">
                    <mark>
                        <h3 class="bg-transparent">مجتبی مینوی</h3>
                        <p>نگاهی به زندگی و آثار وی</p>
                    </mark>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>

    <div class="container marketing mt-4">
        <!-- Three columns of text below the carousel -->
        <div class="row">
            @foreach($books as $book)
            <div class="col-4 border border-dark mx-1" align="center">
                <img class="rounded-circle" src="/book-image/{{$book->image}}" alt="Generic placeholder image" width="140" height="140">
                <h2 class="mt-1">{{$book->name}}</h2>
                <p>{{$book->description}}</p>

                <p ><a class="btn btn-secondary" href="/showBook/{{$book->id}}" role="button">مشاهده این کتاب</a></p>

            </div><!-- /.col-lg-4 -->
          @endforeach
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="1.jpg" >
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="1.jpg">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="1.jpg">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

@endsection
