@extends('layouts-dashboard.test')
@section ('body')
        <h1 class="mt-3">لیست کتاب های مورد علاقه </h1>
    <div class="row my-4">

        @foreach(auth()->user()->favorite()->with('books')->get() as $favorite)
            @foreach ($favorite->books as $book)
                <div class="col-md-4">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h5 class="mb-0">
                                <a class="text-dark" href="#">{{$book->name}}</a>
                            </h5>
                            <smal>نویسنده :</smal>
                            <div class="float-right">
                                {{$book->author}}
                            </div>
                            <a href="/showBook/{{$book->id}}">بیشتر</a>
                            <div class="bottom pr-2 pb-2">
                            @if ($book->favorite_book)
                                <a href="/unfavoriteBook/{{$book->id}}">
                                    <button class="btn btn-success mb-2">حذف از علاقه مندی</button>
                                </a>
                                <br>
                            @else
                                <a href="/favoriteBook/{{$book->id}}">
                                    <button class="btn btn-outline-success mb-2">افزودن به علاقه مندی</button>
                                </a>
                                <br>
                            @endif
                                {{jdate($book->created_at)->ago()}}
                            </div>
                        </div>

                        <a href="/showBook/{{$book->id}}">
                            <img src="/book-image/{{$book->image}}" class="card-img-right">
                        </a>

                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

@endsection
