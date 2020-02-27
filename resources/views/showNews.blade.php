@extends('layouts.app')
@section ('content')

    <div class="position-relative overflow-hidden p-3  text-center " style="background-color: #eeeeee">
        <div class="row">
            <div class="col-12 p-lg-5 mx-auto mt-1 ">
                <img class=" mb-2" src="/news-image/{{$news->image}}" style="width: 800px; height: 400px">
                <h1 class="font-weight-bold my-3" align="right">{{$news->title}}</h1>
                <p class="lead font-weight-normal float-right " align="justify" style="line-height:2.5em">
                    {{$news->body}}
                </p>
            </div>
            <h4 class="float-right mr-5">تاریخ خبر : {{jdate($news->created_at)->ago()}}</h4>
        </div>
        <h4 class="float-right mr-4">نوشته شده توسط : {{$news->user->name}}</h4>
    </div>
    <div class=" my-4" align="right">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
        @endif
        <div class="row m-2">
            <div class="col-5 ">
                <form action="/news/comment/{{$news->id}}" method="post" role="form">
                    @csrf
                    <div class="form-group ">
                        <textarea name="body" id="body" cols="60" rows="5" placeholder="نظر خود را بنویسید ..."
                                  required></textarea>
                    </div>
                    @if (auth()->check())
                        <button type="submit" class="btn btn-primary float-right">تایید</button>
                    @else
                        <button type="submit" class="btn btn-primary float-right" disabled data-toggle="tooltip"
                                data-placement="top" title="برای ثبت نظر وارد شوید">تایید
                        </button>
                    @endif
                </form>
            </div>

            <div class="col-7 ">
                <h1>نظرات :</h1>
                @foreach ($news->comments as $comment)
                    <div class="media border p-3 my-3">
                        <img src="/user/{{$comment->user->image}}" alt="John Doe" class="ml-3 mt-1 rounded-circle"
                             style="width:80px;">
                        <div class="media-body">
                            <h4>{{$comment->user->name}} </h4>
                            <p>{{$comment->body}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
