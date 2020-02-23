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

                    @if ($book->favorite_book)
                        <a href="/unfavoriteBook/{{$book->id}}">
                            <button class="btn btn-success mb-2">افزودن به علاقه مندی</button>
                        </a>
                    @else
                        <a href="/favoriteBook/{{$book->id}}">
                            <button class="btn btn-outline-success mb-2">افزودن به علاقه مندی</button>
                        </a>
                    @endif
                    <br>

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

                        @if (! $comment->likes->isEmpty() && $comment->likes->where('user_id',auth()->user()->id)->first())
                            <a href="/unlikeComment/{{$comment->id}}">
                                <button class="btn btn-primary btn-sm">لایک</button>
                            </a>
                        @else
                            <a href="/likeComment/{{$comment->id}}">

                                <button class="btn btn-outline-primary btn-sm">لایک</button>
                            </a>

                        @endif
                        @if ( auth()->user()->id == $comment->user->id)
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
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
            </div>
        @endforeach
    </div>
@endsection
