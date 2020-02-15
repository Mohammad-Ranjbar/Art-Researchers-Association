@extends('layouts.app')
@section ('content')
<body dir="rtl">
    <div class="container-fluid" align="right">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar ">
                <div class="sidebar-sticky m-3">
                    <ul class="nav flex-column ">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                                <span data-feather="home" class="mx-2"></span>
                                داشبورد
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="/dashboard/posts">
                                <span data-feather="file" class="mx-2"></span>
                                پست های انجمن
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/comments">
                                <span data-feather="shopping-cart" class="mx-2"></span>
                                کامنت های شما
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/userEdit">
                                <span data-feather="users" class="mx-2"></span>
                               ویرایش اطلاعات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/createPost">
                                <span data-feather="bar-chart-2" class="mx-2"></span>
                                ایجاد پست انجمن
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="emailAdmin">
                                <span data-feather="layers" class="mx-2"></span>
                                پیام به مدیر
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Year-end sale
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield ('body')
            </main>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
		feather.replace();
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
		var ctx     = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
				datasets: [
					{
						data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
						lineTension: 0,
						backgroundColor: 'transparent',
						borderColor: '#007BFF',
						borderWidth: 4,
						pointBackgroundColor: '#007BFF',
					},
				],
			},
			options: {
				scales: {
					yAxes: [
						{
							ticks: {
								beginAtZero: false,
							},
						},
					],
				},
				legend: {
					display: false,
				},
			},
		});
    </script>
</body>
@endsection
