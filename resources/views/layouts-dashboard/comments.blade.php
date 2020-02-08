@extends('layouts-dashboard.test')
@section ('body')
    <h1 align="right ">کامنت های شما :</h1>
    <table class="table table-striped table-bordered" dir="rtl">
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
                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#myModal-cm-{{$comment->id}}">ویرایش
                        </button>
                        <!-- Modal -->
                        <div id="myModal-cm-{{$comment->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <form action="/comment/{{$comment->id}}" method="post" role="form">
                                            @csrf
                                            {{method_field('PUT')}}
                                            <div class="form-group">
                                                <label for="body">متن نظر</label>
                                                <br>
                                                <textarea name="body" id="body" cols="60"
                                                          rows="10">{{$comment->body}}</textarea>
                                            </div>

                                            <button type="submit" class="btn btn-success">تایید</button>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                        {{--                   end modal--}}

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

                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

@endsection
