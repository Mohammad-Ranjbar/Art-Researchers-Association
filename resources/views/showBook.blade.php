@extends('layouts.app')
@section ('content')

    <div class="position-relative overflow-hidden p-3  text-center bg-light border border-dark"
         xmlns:height="http://www.w3.org/1999/xhtml">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <img class=" mb-2" src="/book-image/{{$book->image}}">
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
                                <textarea name="body" id="body" cols="100" rows="5" placeholder="نظر خود را بنویسید ..."
                                          required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">تایید</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <div class="container mb-5" align="right">
        <h1 class="my-4">نظرات :</h1>
        @foreach ($book->comments as $comment)
            <div class="media border p-3 my-2" style="background-color: #F7F6F6">

                <img src="/user/{{$comment->user->image}}" class="ml-3 mt-1 rounded-circle" style="width:80px; height: 80px">
                <div class="media-body">
                    <h4>{{$comment->user->name}} </h4>
                    <p>{{$comment->body}}</p>
                    <small>{{jdate($comment->created_at)->ago()}}</small>
                </div>
                @if (auth()->check())

                    <div class="btn-group-sm">

                        <button class="btn btn-outline-primary btn-sm">لایک</button>
                        @if ( auth()->user()->id == $comment->user->id)

                            <button class="btn btn-outline-danger btn-sm">حذف</button>
                        @endif

                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection
