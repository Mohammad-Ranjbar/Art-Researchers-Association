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
                    <button class="btn btn-sm btn-danger">mom</button>
                    <button class="btn btn-sm btn-warning">mom</button>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
@endsection
