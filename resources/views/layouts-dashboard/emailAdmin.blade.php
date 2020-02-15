@extends('layouts-dashboard.test')
@section ('body')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
    @endif
    <div class="container my-5 border">
        <form action="/emailAdmin" method="post" role="form">
            @csrf
            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="عنوان" required>
            </div>
            <div class="form-group">
                <label for="email">ایمیل</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="ایمیل" required>
            </div>
            <div class="form-group">
                <label for="description">متن</label> <br>
                <textarea name="body" id="body" cols="155" rows="10" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">تایید</button>
        </form>
    </div>

@endsection
