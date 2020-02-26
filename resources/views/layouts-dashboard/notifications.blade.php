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
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <a href="{{$notification->data['url']}}">
                                {{$notification->data['message']}}
                            </a>
                        </td>
                        <td>{{jdate($notification->created_at)->ago()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
