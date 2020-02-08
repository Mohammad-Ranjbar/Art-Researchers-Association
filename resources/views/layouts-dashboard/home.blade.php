@extends('layouts-dashboard.test')
@section ('body')

    <div class="container my-5" >
        <div class="row" align="center">
            <div class="col-12 border" >
                <img src="/user/{{auth()->user()->image}}" style="height: 200px;width: 200px" >
            <h3 class="my-3">{{auth()->user()->name}}</h3>
            </div>
            <div class="col-4 border my-3">
                <h2>تعداد نظرات شما</h2><br>
                <h4>{{auth()->user()->comments->count()}}</h4>
            </div>
            <div class="col-4 border my-3">
                <h2>تعداد پست های شما</h2><br>
                <h4>{{auth()->user()->forums->count()}}</h4>
            </div>
            <div class="col-4 border my-3">
                <h2>تعداد نظرات شما</h2><br>
{{--                <h4>{{auth()->user()->forums}}</h4>--}}
            </div>
        </div>
    </div>

@endsection
