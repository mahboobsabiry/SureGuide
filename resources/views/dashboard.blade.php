@extends('layouts.app')

@section('content')


    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
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

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="/dashboard">Today</a></li>
                                    <li><a class="dropdown-item" href="/dashboard/?order_month=true">This Month</a></li>
                                    <li><a class="dropdown-item" href="/dashboard/?order_year=true">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Order <span> | @if(@isset($_GET['order_year']))
                                            2023 @elseif(@isset($_GET['order_month'])) This Month @else
                                            Today @endif</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$order_count}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="/dashboard/">Today</a></li>
                                    <li><a class="dropdown-item" href="/dashboard/?revenue_month=true">This Month</a>
                                    </li>
                                    <li><a class="dropdown-item" href="/dashboard/?revenue_year=true">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Revenue <span> | @if(@isset($_GET['revenue_year']))
                                            2023 @elseif(@isset($_GET['revenue_month'])) This Month @else
                                            Today @endif</span></h5>


                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$revenue->price > 0 ? $revenue->price . ' ' . $revenue->name . ' ' . $revenue->symbol : '0'; }}</h6>
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
                                <h5 class="card-title">Total Food<span> | in Menu</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bx-food-menu"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $food_count }}</h6>
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
                                    <li><a class="dropdown-item" href="/dashboard/?report_week=true"> This Week</a></li>
                                    <li><a class="dropdown-item" href="/dashboard/?report_month=true"> This Month</a>
                                    </li>
                                    <li><a class="dropdown-item" href="/dashboard/"> This Year</a></li>
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
                                                name: 'Order',
                                                data: [
                                                    <?php
                                                    foreach ($report as $r) {
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
                                                <?php } else if (isset($_GET['report_week'])) {?>
                                                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
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

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
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
                                <h5 class="card-title">Recent Orders</h5>
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Food</th>
                                        <th scope="col">Total Order</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recent_orders as $order)
                                        <tr>
                                            <th scope="row">
                                                <img src="{{ asset('images/menu/' . $order->img) }}" alt=""
                                                     style="width:50px;" class="rounded">
                                            </th>
                                            <td>
                                                {{$order->name}}
                                            </td>
                                            <td>
                                                {{$order->quantity}}
                                            </td>
                                            <td>
                                                {{$order->symbol . ' ' . $order->price}}
                                            </td>
                                            <td>
                                                @if($order->status == '0')
                                                    <span class="badge bg-warning">New</span>
                                                @elseif($order->status == '1')
                                                    <span class="badge bg-warning">Approved</span>
                                                @elseif($order->status == '2')
                                                    <span class="badge bg-success">Delivered</span>
                                                @else
                                                    <span class="badge bg-danger">Dropped</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

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

                            <div class="card-body pb-0">
                                <h5 class="card-title">Top Food</h5>
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th class="text-start" scope="col">Preview</th>
                                        <th class="text-start" scope="col">Food</th>
                                        <th class="text-start" scope="col">Size</th>
                                        <th class="text-center" scope="col">Total Order</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($popular_foods as $p_food)
                                        <tr>
                                            <th class="text-start" scope="row">
                                                <img src="{{ asset('images/menu/' . $p_food->img) }}" alt="">
                                            </th>
                                            <td class="text-start">
                                                <span class="text-primary fw-bold">
                                                    {{$p_food->name}}
                                                </span>
                                            </td>
                                            <td class="text-start  fw-bold">@sizeWrapper($p_food->size)</td>
                                            <td class="text-center ">{{$p_food->total_orders}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Top Selling -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
