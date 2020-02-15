@extends('layouts-dashboard.test')
@section ('body')
    <h1 class="my-5" align="right">ایجاد پست در انجمن :</h1>

    <div class="container my-5 border">
        <form action="/forum" method="post" role="form">
            @csrf
            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="عنوان" required>
            </div>
            <div class="form-group">
                <label for="description">متن</label> <br>
                <textarea name="body" id="body" cols="155" rows="10" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">تایید</button>
        </form>
    </div>
@endsection
