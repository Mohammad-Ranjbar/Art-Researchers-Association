@extends('layouts.app')
@section ('content')

    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light border border-dark"
         xmlns:height="http://www.w3.org/1999/xhtml">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <img class="rounded-circle mb-2" src="/{{$book->image}}" style="width: 200px; height: 200px">
            <h1 class="font-weight-bold">{{$book->name}}</h1>
            <a href="/author/{{$book->author}}"><h2>{{$book->author}}</h2></a>
            <h4>{{$book->publisher}}</h4>
            <p class="lead font-weight-normal" align="justify">
                {{$book->description}}
            </p>
            <div>
                <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#comment">نظر خود را بنویسید
                </button>
                <div id="comment" class="collapse">
                    <form action="" method="post" role="form">

                        <div class="form-group">
                            <label for=""></label>
                            <textarea name="body" id="body" cols="100" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">تایید</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="container " align="right">
        <h1>نظرات :</h1>
        <div class="media border p-3">
            <img src="1.jpg" alt="John Doe" class="ml-3 mt-3 rounded-circle" style="width:60px;">
            <div class="media-body">
                <h4>John Doe </h4>
                <p>Lorem ipsum...</p>
            </div>
        </div>
    </div>
@endsection
