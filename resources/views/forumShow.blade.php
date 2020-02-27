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
                <h4 class=" my-3" align="right">{{jdate($forum->created_at)->ago()}}</h4>
            </div>
        </section>

        <div class="row mx-2" align="right">

            <div class="col-5 ">
                <form action="/forum/comment/{{$forum->id}}" method="post" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="body">نظر خود را وارد کنید</label><br>
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
                @foreach ($forum->comments as $comment)
                    <div class="media border p-3 my-3" id="{{$comment->id}}">
                        <img src="/user/{{$comment->user->image}}" alt="John Doe" class="ml-3 mt-1 rounded-circle"
                             style="width:80px;">

                        <div class="media-body">
                            @if (auth()->check())
                                <div class="btn-group-sm float-left">
                                    @if (auth()->user()->id !== $comment->user->id)

                                        @if (! $comment->likes->isEmpty() && $comment->likes->where('user_id',auth()->user()->id)->first())
                                            <a href="/unlikeComment/{{$comment->id}}">
                                                <button class="btn btn-primary btn-sm">لایک</button>
                                            </a>
                                        @else
                                            <a href="/likeComment/{{$comment->id}}">

                                                <button class="btn btn-outline-primary btn-sm">لایک</button>
                                            </a>

                                        @endif
                                    @endif
                                    @if ( auth()->user()->id == $comment->user->id)
                                        <button class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-target="#myModal-del-{{$comment->id}}">حذف
                                        </button>
                                        <!-- Modal -->
                                        <div id="myModal-del-{{$comment->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        <form action="/comment/delete/{{$comment->id}}" method="post" role="form">
                                                            @csrf
                                                            {{method_field('DELETE')}}
                                                            <div class="form-group my-3">
                                                                <h3 align="right">آیا از حذف نظر مطمعن هستید </h3>
                                                            </div>
                                                            <div class="btn-group">
                                                                <button type="submit" class="btn btn-danger mx-1">تایید</button>
                                                                <button type="button" data-dismiss="modal"
                                                                        class="btn btn-warning">انصراف
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        {{--                   end modal--}}

                                    @endif

                                </div>
                            @endif
                            <h4>{{$comment->user->name}} </h4>
                            <p>{{$comment->body}}</p>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
