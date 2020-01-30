@extends('layouts.app')
@section ('content')

    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light border border-dark"
         xmlns:height="http://www.w3.org/1999/xhtml">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <img class="rounded-circle mb-2" src="/{{$book->image}}" style="width: 200px; height: 200px">
            <h1 class="font-weight-bold">{{$book->name}}</h1>
            <a href="/author/{{$book->author}}"><h2>{{$book->author}}</h2></a>
            <h4>نشر {{$book->publisher}}</h4>
            <p class="lead font-weight-normal" align="center">
                {{$book->description}}
            </p>
            <div>
                @if (auth()->check())

                <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#comment">نظر خود را بنویسید
                </button>
                <div id="comment" class="collapse">
                    <form action="/comment/book/{{$book->id}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="body"></label>
                            <textarea name="body" id="body" cols="100" rows="5" placeholder="نظر خود را بنویسید ..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">تایید</button>
                    </form>
                </div>
                @endif
            </div>
        </div>

    </div>

    <div class="container " align="right">
        <h1>نظرات :</h1>
        @foreach ($book->comments as $comment)

        <div class="media border p-3">
            <img src="/{{$comment->user->image}}" alt="John Doe" class="ml-3 mt-1 rounded-circle" style="width:80px;">
            <div class="media-body">
                <h4>{{$comment->user->name}} </h4>
                <p>{{$comment->body}}</p>
            </div>
        </div>
        @endforeach
    </div>
@endsection
