@extends('layouts.app')
@section ('content')
    <div class="container">
        <h1 align="center">اطلاعات پروفایل</h1>
        <div class="row">
            <div class="col-8" align="center">
                <div class="card" align="right">
                    <div class="card-img">
                        <img class="rounded-circle" src="/user/{{auth()->user()->image}}" style="height: 300px;height: 200px">
                    </div>
                    <div class="card-body">
                        <h3> نام :{{auth()->user()->name}}</h3>
                        <h3> ایمیل :{{auth()->user()->email}}</h3>
                        <h3> عضویت از :{{jdate(auth()->user()->created_at)->ago()}}</h3>
                    </div>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">ویرایش اطلاعات شخصی
                    </button>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <form action="/userEdit" method="post" role="form">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <div class="form-group">
                                            <label for="name">نام </label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                   value="{{auth()->user()->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">ایمیل </label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                   value="{{auth()->user()->email}}">
                                        </div>

                                        <button type="submit" class="btn btn-success">تایید</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                    {{--                   end modal--}}

                </div>
            </div>

        </div>
        <h1 align="right">پست های شما در انجمن :</h1>
        <table class="table table-striped">
            <thead>
                <tr align="center">
                    <th scope="col">آیدی پست</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">چکیده متن</th>
                    <th scope="col">تعداد نظرات</th>
                    <th scope="col">ویرایش</th>

                </tr>
            </thead>
            <tbody>
                @foreach (auth()->user()->forums as $forum)

                    <tr align="center">
                        <th scope="row">{{$forum->id}}</th>
                        <td>{{$forum->title}}</td>
                        <td>{{Str::limit($forum->body,50)}}</td>
                        <td>{{$forum->comments->count()}}</td>
                        <td class="btn-group-sm">

                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#myModal-{{$forum->id}}">ویرایش

                            </button>
                            <!-- Modal -->
                            <div id="myModal-{{$forum->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        </div>
                                        <div class="modal-body">
                                            <form action="/forum/{{$forum->id}}" method="post" role="form">
                                                @csrf
                                                {{method_field('PUT')}}
                                                <div class="form-group">
                                                    <label for="title">عنوان </label>
                                                    <input type="text" class="form-control" name="title" id="title"
                                                           placeholder="عنوان خبر"
                                                           value="{{$forum->title}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="body">بدنه</label>
                                                    <br>
                                                    <textarea name="body" id="body" cols="60"
                                                              rows="10">{{$forum->body}}</textarea>
                                                </div>

                                                <button type="submit" class="btn btn-success">تایید</button>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            {{--                   end modal--}}

                            <button class="btn btn-sm btn-danger">حذف</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h1 align="right ">کامنت های شما :</h1>
        <table class="table table-striped table-bordered"   dir="rtl">
            <thead align="right">
                <tr>
                    <th scope="col">آیدی کامنت</th>
                    <th scope="col">برای موضوع</th>
                    <th scope="col">متن کامنت</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody align="right">
                @foreach (auth()->user()->comments as $comment)
                <tr>
                    <th scope="row">{{$comment->id}}</th>
                    @if ($comment->commentable->title)
                    <td><b>پست انجمن : </b>{{$comment->commentable->title }}</td>
                        @else
                    <td><b>کتاب : </b> {{$comment->commentable->name }}</td>

                    @endif

                    <td>{{Str::limit($comment->body,100)}}</td>
                    <td class="btn-group-sm" align="left">
                        <button class="btn btn-sm btn-warning">ویرایش </button>
                        <button class="btn btn-sm btn-danger">حذف</button>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection
