@extends('layouts-dashboard.test')
@section ('body')
    <h1 align="right">پست های شما در انجمن :</h1>
    <table class="table table-striped table-bordered" dir="rtl">
        <thead align="right">
            <tr>
                <th scope="col">آیدی پست</th>
                <th scope="col">عنوان</th>
                <th scope="col">چکیده متن</th>
                <th scope="col">تعداد نظرات</th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody align="right">
            @foreach (auth()->user()->forums as $forum)

                <tr>
                    <th scope="row">{{$forum->id}}</th>
                    <td>{{$forum->title}}</td>
                    <td>{{Str::limit($forum->body,100)}}</td>
                    <td>{{$forum->comments->count()}}</td>
                    <td class="btn-group-sm" align="left">

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
                                    <div class="modal-body" align="right">
                                        <form action="/forum/{{$forum->id}}" method="post" role="form">
                                            @csrf
                                            {{method_field('PUT')}}
                                            <div class="form-group">
                                                <label for="title">عنوان </label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                       value="{{$forum->title}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="body">بدنه</label>
                                                <br>
                                                <textarea name="body" id="body" cols="64"
                                                          rows="10">{{$forum->body}}</textarea>
                                            </div>

                                            <button type="submit" class="btn btn-success">تایید</button>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                        {{--                   end modal--}}

                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#myModal-del-{{$forum->id}}">حذف
                        </button>
                        <!-- Modal -->
                        <div id="myModal-del-{{$forum->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <form action="/forum/delete/{{$forum->id}}" method="post" role="form">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <div class="form-group my-3">
                                                <h3 align="right">آیا از حذف پست مطمعن هستید.با حذف پست تمامی نظرات پست نیز حدف می
                                                    شوند</h3>
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
