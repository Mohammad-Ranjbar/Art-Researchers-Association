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
                    <div class="card  mb-4">
                        <div class="card-img-top " align="right">

                        <a href="/showBook/{{$book->id}}">
                            <img  src="/book-image/{{$book->image}}" style="width: 350px">
                        </a>
                        </div>
                        <div class="card-body d-flex flex-column align-items-start">
                            <h5 >
                                <a class="text-dark " href="#">{{$book->name}}</a>
                            </h5>
                            <smal>نویسنده :</smal>
                            <div class="float-right">
                                {{$book->author}}
                            </div>
                            <smal>انتشارات :</smal>
                            <div class="float-right">
                              {{$book->publisher}}
                            </div>
                            <smal>توضیحات :</smal>
                            <div class="float-right">
                                {{$book->description}}
                            </div>
                            <smal>دسته بندی :</smal>
                            <div class="float-right">
                                <a href="/listBook/{{$book->list->id}}">{{$book->list->name}}</a>
                            </div>
                            <smal>معرفی توسط :</smal>
                            <div class="float-right">
                                {{$book->user->name}}
                            </div>

                            <a href="/showBook/{{$book->id}}">بیشتر</a>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
