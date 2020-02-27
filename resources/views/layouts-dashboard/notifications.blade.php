@extends('layouts-dashboard.test')
@section ('body')
    <h1 class="mt-3">اعلانات</h1>

    <div class="row my-4">

        <table class="table table-striped" align="center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اعلانات</th>
                    <th scope="col">تاریخ</th>
                </tr>
            </thead>
            <tbody>
                @foreach(auth()->user()->notifications as $notification)
                    <tr class="border-bottom">
                        <th scope="row"> {{ $loop->iteration }}</th>
                        <td>
                            <img src="/user/{{$notification->data['image']}}" class="rounded-circle" alt=""
                                 style="height: 30px;width: 50px">
                            <b>
                                {{$notification->data['message']}}
                            </b>
                            <a href="{{$notification->data['url']}}">
                                <button class="btn btn-sm btn-secondary">مشاهده</button>
                            </a>
                        </td>
                        <td>{{jdate($notification->created_at)->ago()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
