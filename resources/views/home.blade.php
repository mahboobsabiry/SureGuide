@extends('layouts.app')

@section('content')


    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Order Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            {{--<div class="filter">--}}
                            {{--<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
                            {{--<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
                            {{--<li class="dropdown-header text-start">--}}
                            {{--<h6>Filter</h6>--}}
                            {{--</li>--}}

                            {{--<li><a class="dropdown-item" href="/dashboard">Today</a></li>--}}
                            {{--<li><a class="dropdown-item" href="/dashboard/?order_month=true">This Month</a></li>--}}
                            {{--<li><a class="dropdown-item" href="/dashboard/?order_year=true">This Year</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}

                            <div class="card-body">
                                <h5 class="card-title">Resturants</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-shop"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$resturant_count}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            {{--<div class="filter">--}}
                            {{--<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
                            {{--<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
                            {{--<li class="dropdown-header text-start">--}}
                            {{--<h6>Filter</h6>--}}
                            {{--</li>--}}

                            {{--<li><a class="dropdown-item" href="/dashboard/">Today</a></li>--}}
                            {{--<li><a class="dropdown-item" href="/dashboard/?revenue_month=true">This Month</a></li>--}}
                            {{--<li><a class="dropdown-item" href="/dashboard/?revenue_year=true">This Year</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}

                            <div class="card-body">
                                <h5 class="card-title">Register Customer </h5>


                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-user-pin"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$register_customer }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Menu Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                            {{--<div class="filter">--}}
                            {{--<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
                            {{--<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
                            {{--<li class="dropdown-header text-start">--}}
                            {{--<h6>Filter</h6>--}}
                            {{--</li>--}}

                            {{--<li><a class="dropdown-item" href="#">Today</a></li>--}}
                            {{--<li><a class="dropdown-item" href="#">This Month</a></li>--}}
                            {{--<li><a class="dropdown-item" href="#">This Year</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}

                            <div class="card-body">
                                <h5 class="card-title">Unregister Customer</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri ri-user-3-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($unregister_customer) }}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="/home/?report_month=true"> This Month</a>
                                    </li>
                                    <li><a class="dropdown-item" href="/home/"> This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Reports <span> | @if(@isset($_GET['report_month'])) This
                                        Month @elseif(@isset($_GET['report_week'])) This Week @else 2023 @endif</span>
                                </h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>
                                <script>
                                    $(document).ready(function () {


                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'Resturant',
                                                data: [
                                                    <?php
                                                    foreach ($report as $r) {
                                                        echo $r . ',';
                                                    }
                                                    ?>
                                                ],
                                            }, {
                                                name: 'Unregister Customer',
                                                data: [
                                                    <?php
                                                    foreach ($report_unregister_customer as $r) {
                                                        echo $r . ',';
                                                    }
                                                    ?>
                                                ],
                                            }],
                                            chart: {
                                                height: 400,
                                                type: 'area',
                                                toolbar: {
                                                    show: true
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'category',

                                                <?php if (isset($_GET['report_month'])) {?>
                                                categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                                                <?php }else{ ?>
                                                categories: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nev', 'Dec'],
                                                <?php } ?>

                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    })
                                </script>
                                <!-- End Line Chart -->
                            </div>
                        </div>
                    </div><!-- End Reports -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

    <script>
        $("#sendverify").click(function () {
            $.post("api/send-verify",
                {
                    email: 'masihkhairy@gmail.com',
                    _token: $("meta[name='csrf-token']").attr('content')
                },
                function (data, status) {
//                    alert("Data: " + data + "\nStatus: " + status);
                });
        });

        $("#verify").click(function () {
            $.post("api/verify",
                {
                    email: 'masihkhairy@gmail.com',
                    verification_code: '619960',
                    _token: $("meta[name='csrf-token']").attr('content')
                },
                function (data, status) {
//                    alert("Data: " + data + "\nStatus: " + status);
                });
        });
    </script>
@endsection
