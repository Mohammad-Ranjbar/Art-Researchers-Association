@extends('layouts.app')
@section ('content')
    <div class="position-relative overflow-hidden  text-center bg-light border border-dark">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">{{$list->name}}</h1>
            <p class="lead font-weight-normal" align="center">
                {{$list->description}}
            </p>
        @if (auth()->check())
            <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                    Open Modal
                </button>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="/book/{{$list->id}}/store" method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name"></label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="نام" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="author"></label>
                                        <input type="text" class="form-control" name="author" id="author" placeholder="نویسنده"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="publisher"></label>
                                        <input type="text" class="form-control" name="publisher" id="publisher"
                                               placeholder="ناشر" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description"></label>
                                        <input type="text" class="form-control" name="description" id="description"
                                               placeholder="توضیحات" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image"></label>
                                        <input type="file" class="form-control" name="image" id="image" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            @endif

        </div>

    </div>
    <div class="float-right mx-3  btn-group">
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            مرتب سازی
        </button>
        <div class="dropdown-menu" align="right" dir="rtl">
            <a class="dropdown-item" href="/listBook/{{$list->id}}?new=1">جدید ترین</a>
            <a class="dropdown-item" href="/listBook/{{$list->id}}?favorite=1">محبوب ترین</a>
        </div>
    </div>
    <div class="m-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
        @endif
        <div class="row mb-2">
            @foreach($list->books as $book)
                <div class="col-md-4">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">

                        <div class="card-body d-flex flex-column align-items-start">
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <h5 class="mb-0">
                                <a class="text-dark" href="#">{{$book->name}}</a>
                            </h5>
                            <smal>نویسنده :</smal>
                            <div class="float-right">
                                {{$book->author}}
                            </div>
                            <a href="/showBook/{{$book->id}}">بیشتر</a>
                            <div class="bottom pr-2 pb-2">{{jdate($book->created_at)->ago()}}</div>
                        </div>

                        <a href="/showBook/{{$book->id}}">
                            <img src="/book-image/{{$book->image}}" class="card-img-right">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

@endsection
