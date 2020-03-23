@extends('adminPanel.layout')
@section ('body')
    <table class="table table-striped m-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام کاربر</th>
                <th scope="col">ایمیل</th>
                <th scope="col">نقش</th>
                <th scope="col">تاریخ عضویت</th>
                <th scope="col">ویرایش / حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

                <tr>
                    <th scope="row">1</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{jdate($user->created_at)->ago()}}</td>
                    <td class="btn-group-sm">

                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#myModal-cm-{{$user->id}}">ویرایش
                        </button>
                        <!-- Modal -->
                        <div id="myModal-cm-{{$user->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <form action="/user/{{$user->id}}" method="post" role="form">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">نام کاربر</label>
                                                <br>
                                                <input name="name" id="name" class="form-control" type="text"
                                                       value="{{$user->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">نام کاربر</label>
                                                <br>
                                                <input name="email" id="email" class="form-control" type="email"
                                                       value="{{$user->email}}">
                                            </div>

                                            <button type="submit" class="btn btn-success">تایید</button>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                        {{--                   end modal--}}
                        @if (! $user->role == 'admin')

                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#myModal-del-{{$user->id}}">
                                حذف
                            </button>
                            <!-- Modal -->
                            <div id="myModal-del-{{$user->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <form action="/user/{{$user->id}}" method="post" role="form">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <div class="form-group my-3">
                                                    <h3 align="right">آیا از حذف مطمعن هستید </h3>
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
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
