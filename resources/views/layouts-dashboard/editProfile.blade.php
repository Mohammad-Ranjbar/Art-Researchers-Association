@extends('layouts-dashboard.test')
@section ('body')

    <div class="container my-5">
        <div class="row" align="center">
            <div class="col-9 border">
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

@endsection
