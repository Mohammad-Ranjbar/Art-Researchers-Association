@extends('layouts.app')
@section ('content')

    <section class="jumbotron text-center ">
        <div class="container">
            <h1 class="jumbotron-heading mt-3 py-5">{{$name}}</h1>
            <p class="lead text-muted">
                لیست کتاب های {{$name}}
            </p>
        </div>
    </section>
    <div class="container">
        <div class="row">
            @foreach($books as $book)
                <div class="col-4">
                    <div class="media border border-dark">
                        <img src="/book/{{$book->image}}" style="height: 150px;width: 150px;">
                        <div class="media-body text-center m-3" align="right">
                            نام کتاب : <a href="/showBook/{{$book->id}}">{{$book->name}}</a>
                            <br>
                            انتشارات : {{$book->publisher}}
                            <br>
                            توضیحات : {{$book->description}}
                            <br>
                            معرفی شده توسط : {{$book->user->name}}
                            <br>

                                دسته بندی : <a href="/listBook/{{$book->list->id}}">{{$book->list->name}}</a>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
