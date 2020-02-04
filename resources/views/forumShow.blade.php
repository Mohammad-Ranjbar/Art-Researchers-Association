@extends('layouts.app')
@section ('content')
    <main role="main">

        <section class="jumbotron text-center ">
            <div class="container">
                <h1 class="jumbotron-heading my-3">
                    {{$forum->title}}
                </h1>
                <p class="lead " align="justify">
                 {{$forum->body}}
                </p>

        <h4 class="border-top my-3" align="right">نوشته شده توسط : {{$forum->user->name}}</h4>
        <h4 class=" my-3" align="right">{{$forum->created_at->diffForHumans()}}</h4>
            </div>
        </section>
        <div class="container" align="right">
            <div class="row">
                {{--                @foreach ($forums as $forum)--}}

                {{--                    <div class="col-12 my-4">--}}
                {{--                        <div class="card">--}}
                {{--                            <div class="card-header">--}}
                {{--                                <a href="/forum/{{$forum->id}}">--}}
                {{--                                    {{$forum->title}}--}}
                {{--                                </a>--}}
                {{--                            </div>--}}
                {{--                            <div class="card-body">--}}
                {{--                                {{ Str::limit( $forum->body ,200)}}--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                @endforeach--}}
            </div>
        </div>
        <div class="row mx-2" align="right">

            <div class="col-5 ">
                <form action="/forum/comment/{{$forum->id}}" method="post" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="body">نظر خود را وارد کنید</label><br>
                        <textarea name="body" id="body" cols="60" rows="5" placeholder="نظر خود را بنویسید ..."></textarea>

                    </div>
                    @if (auth()->check())
                        <button type="submit" class="btn btn-primary float-right">تایید</button>
                    @else
                        <button type="submit" class="btn btn-primary float-right" disabled data-toggle="tooltip" data-placement="top" title="برای ثبت نظر وارد شوید">تایید</button>

                    @endif
                </form>
            </div>

            <div class="col-7 ">
                <h1 >نظرات :</h1>
                @foreach ($forum->comments as $comment)
                    <div class="media border p-3 my-3">
                        <img src="/user/{{$comment->user->image}}" alt="John Doe" class="ml-3 mt-1 rounded-circle" style="width:80px;">
                        <div class="media-body">
                            <h4>{{$comment->user->name}} </h4>
                            <p>{{$comment->body}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>

    </main>
@endsection
