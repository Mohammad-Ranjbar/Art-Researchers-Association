@extends('layouts.app')
@section ('content')

    <div class="container border border-dark" dir="ltr">
        <div class="man">
            <div><img src="/1.jpg" style="width: 1000px;height: 80px" class="my-3"></div>
            <div><img src="/2.jpg" style="width: 1000px;height: 80px" class="my-3"></div>
            <div><img src="/3.jpg" style="width: 1000px;height: 80px" class="my-3"></div>
            <div><img src="/1.jpg" style="width: 1000px;height: 80px" class="my-3"></div>
            <div><img src="/1.jpg" style="width: 1000px;height: 80px" class="my-3"></div>
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
		$(document).ready(() =>
			$('.man').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: true,
				autoplay: true,
				speed: 200,
			}),
		);
    </script>

@endsection
