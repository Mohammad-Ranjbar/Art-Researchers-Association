@extends('layouts.app')
@section ('content')

    <div class="position-relative overflow-hidden p-3  text-center " style="background-color: #eeeeee">

        <div class="row">
            <div class="col-12 p-lg-5 mx-auto my-1 ">
                <img class=" mb-2" src="/news-image/{{$news->image}}" style="width: 800px; height: 400px">
                <h1 class="font-weight-bold my-3" align="right">{{$news->title}}</h1>
                <p class="lead font-weight-normal float-right" align="center">
                    {{$news->body}}
                </p>



                <div>
                    {{--                @if (auth()->check())--}}
                    {{--                    <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#comment">نظر خود را بنویسید--}}
                    {{--                    </button>--}}
                    {{--                    <div id="comment" class="collapse">--}}
                    {{--                        <form action="/comment/book/{{$book->id}}" method="post" role="form">--}}
                    {{--                            @csrf--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label for="body"></label>--}}
                    {{--                                <textarea name="body" id="body" cols="100" rows="5" placeholder="نظر خود را بنویسید ..."></textarea>--}}
                    {{--                            </div>--}}

                    {{--                            <button type="submit" class="btn btn-primary float-right">تایید</button>--}}
                    {{--                        </form>--}}
                    {{--                    </div>--}}
                    {{--                @endif--}}
                </div>
            </div>
        <h4 class="float-right   m-5">تاریخ خبر : {{$news->created_at->diffForHumans()}}</h4>
        </div>

        <h4 class="float-right my-5">نوشته شده توسط : {{$news->user->name}}</h4>
    </div>

    <div class="container mb-5" align="right">
        <h1>نظرات :</h1>
{{--        @foreach ($book->comments as $comment)--}}
{{--            <div class="media border p-3">--}}
{{--                <img src="/user/{{$comment->user->image}}" alt="John Doe" class="ml-3 mt-1 rounded-circle" style="width:80px;">--}}
{{--                <div class="media-body">--}}
{{--                    <h4>{{$comment->user->name}} </h4>--}}
{{--                    <p>{{$comment->body}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    </div>
@endsection
