@extends('layouts.app')
@section('styles')

@endsection
@section ('content')
    <section class="jumbotron text-center ">
        <div class="container">
            <h1 class="jumbotron-heading mt-3">اخبار</h1>
            <p class="lead text-muted">
                شما را با اخرین اخبار همیشه به روز نگه می داریم.
            </p>
        @if (auth()->check())

            <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">اضافه کردن
                    خبر

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
                                <form action="/news" method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">عنوان خبر</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                               placeholder="عنوان خبر"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="body">متن خبر</label>
                                        <br>
                                        <textarea name="body" id="body" cols="60" rows="10" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">تصویر خبر</label>
                                        <input type="file" class="form-control" name="image" id="image" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">تایید</button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            @endif
        </div>
    </section>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">days</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">#</th>
                <td >"-disable" </td>
            </tr>
            <tr>
                <th scope="row">#</th>
                <td>{{jdate()->addDays(1)->format('Y-m-d')}}-"-disable"</td>
            </tr>
            <tr>
                <th scope="row">#</th>
                <td>{{jdate()->addDays(2)->format('Y-m-d')}}</td>
            </tr>
            <tr>
                <th scope="row">#</th>
                <td>{{jdate()->addDays(3)->format('Y-m-d')}}</td>
            </tr>
            <tr>
                <th scope="row">#</th>
                <td>{{jdate()->addDays(4)->format('Y-m-d')}}</td>
            </tr>
            <tr>
                <th scope="row">#</th>
                <td>{{jdate()->addDays(5)->format('Y-m-d')}}</td>
            </tr>
            <tr>
                <th scope="row">#</th>
                <td>{{jdate()->addDays(6)->format('Y-m-d')}}</td>
            </tr>
            </tbody>
        </table>
        {{--        <textarea name="editor" id="editor"></textarea>--}}
{{--        <h1>add Days : {{jdate()->addDays(7)->format('Y-m-d')}}</h1>--}}
{{--        <hr>--}}
{{--        <h1>naxt week: {{jdate()->getNextWeek()->getNextWeek()->format('Y-m-d')}}</h1>--}}
        <hr>
{{--        <h1>naxt week: {{jdate()->format('Y-m-d')->getDayOfWeek()}}</h1>--}}
        <hr>
        @php

            $var =jdate();

            echo "today day of :". $var->getDayOfWeek();
            echo jdate()->subDays($var->getDayOfWeek());


        @endphp
        <hr>
        {{  Morilog\Jalali\Jalalian::fromDateTime('yesterday')->subMonths(1)->format('Y-m-d')}}
        <div class="row">
            @foreach ($news as $new)
                <div class="col-12 mb-5">
                    <div class="card" align="right">
                        <img class="card-img-top " src="/news-image/{{$new->image}}">
                        <div class="card-body">
                            <h2>{{$new->title}}</h2>
                            {{ Str::limit( $new->body ,200)}}
                            <br>
                            <a href="/news/{{$new->id}}">
                                <button class="btn btn-success my-3">
                                    بیشتر
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="pagination">
            </div>
        </div>
        {{$news->links()}}
    </div>


@endsection

@section('scripts')
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
    <script>

        CKEDITOR.replace('editor', {
            language: 'fa',
            uiColor: '#9AB8F3',
            customConfig: '{{asset('ckeditor/build-config.js')}}',
            filebrowserImageBrowseUrl: '{{asset('/laravel-filemanager?type=Images')}}',
            filebrowserImageUploadUrl: '{{asset('/laravel-filemanager/upload?type=Images&_token=')}}',
            filebrowserBrowseUrl: '{{asset('/laravel-filemanager?type=Files')}}',
            filebrowserUploadUrl: '{{asset('/laravel-filemanager/upload?type=Files&_token=')}}'
        });
    </script>
@endsection
