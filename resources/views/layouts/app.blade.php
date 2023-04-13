<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'IZI-GET' }}</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/jquery.form.min.js') }}"></script>

    {{--popup menu--}}
    <script src="{{ asset('assets/popmenu.js') }}"></script>
    <link href="{{ asset('assets/popmenu.css') }}" rel="stylesheet">

    <!-- =======================================================
    * App Name: izi-get
    * App URL: izi-get.com
    * Author: Spottech
    * Developer: Masihullah Khairy
    * Date: 2022/14/12
    ======================================================== -->
</head>
<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/home" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/favicon.png') }}" alt="">
            <span class="d-none d-lg-block">IZI-GET</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    {{--<div class="search-bar">--}}
    {{--<form class="search-form d-flex align-items-center" method="POST" action="#">--}}
    {{--<input type="text" name="query" placeholder="Search" title="Enter search keyword">--}}
    {{--<button type="submit" title="Search"><i class="bi bi-search"></i></button>--}}
    {{--</form>--}}
    {{--</div><!-- End Search Bar -->--}}

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            @if(auth()->user()->isAdmin != '1')
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" id="seen_nf">
                        <i class="bi bi-bell"></i>
                        @isset($call_waiters_count)
                            @if($call_waiters_count > 0)
                                <span class="badge bg-primary badge-number" id="total_nf">
                                    {{$call_waiters_count}}
                                </span>
                            @endif
                        @endisset
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            <div style="width: 230px;"></div>
                        </li>
                        @isset($call_waiters)
                            @foreach($call_waiters as $nf)
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="notification-item">
                                    <i class="bi bi-info-circle text-primary"></i>
                                    <div>
                                        <h4>Table {{$nf->table->name}} call for waiter</h4>
                                        {{--<p>Quae dolorem earum veritatis oditseno</p>--}}
                                        <p>
                                            @if(((strtotime(now()->format('Y-m-d H:i')) - strtotime($nf->date . $nf->time)) / 60) <= 0)
                                                {{  'just now'  }}
                                            @elseif(((strtotime(now()->format('Y-m-d H:i')) - strtotime($nf->date . $nf->time)) / 60) <= 60)
                                                {{  ceil((strtotime(now()->format('Y-m-d H:i')) - strtotime($nf->date . $nf->time)) / 60)  .  ' min. ago'  }}
                                            @elseif(((strtotime(now()->format('Y-m-d H:i')) - strtotime($nf->date . $nf->time)) / 60) <= 1440)
                                                {{  ceil((strtotime(now()->format('Y-m-d H:i')) - strtotime($nf->date . $nf->time)) / 60 / 60) .  ' hr. ago'  }}
                                            @else
                                                {{ ceil(((strtotime(now()->format('Y-m-d H:i')) - strtotime($nf->date . $nf->time)) / 60 / 60) / 24) .  ' dy. ago'  }}
                                            @endif
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        @endisset
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="/waiters">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->
                </li>
            @endif

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{asset('images/users/' . Auth::user()->img)}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }}</h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="/home">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-shop-window"></i><span>Restaurants</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @if(auth()->user()->isAdmin == '1')
                    <li>
                        <a href="/resturants">
                            <i class="bi bi-circle"></i><span>Restaurants List</span>
                        </a>
                    </li>
                @elseif(auth()->user()->isAdmin == '0')
                    <li>
                        <a href="/branches">
                            <i class="bi bi-circle"></i><span>Branches</span>
                        </a>
                    </li>
                    <li>
                        <a href="/tables">
                            <i class="bi bi-circle"></i><span>Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="/carousel">
                            <i class="bi bi-circle"></i><span>carousels</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="/tables">
                            <i class="bi bi-circle"></i><span>Tables</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#menu-nav" data-bs-toggle="collapse" href="#">
                <i class="bx bx-food-menu"></i><span>Food Menu</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="menu-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/menu">
                        <i class="bi bi-circle"></i><span>Menu</span>
                    </a>
                </li>
                <li>
                    <a href="/subcategory">
                        <i class="bi bi-circle"></i><span>Sub Category</span>
                    </a>
                </li>
                <li>
                    <a href="/category">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/orders">
                <i class="bi bi-cart"></i>
                <span>Food Orders</span>
            </a>
        </li>
        @if(auth()->user()->isAdmin == '1')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/feedbacks">
                    <i class="ri-feedback-line"></i>
                    <span>Feedbacks</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/contacts">
                    <i class="bi bi-person-fill"></i>
                    <span>Contact us</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/about">
                    <i class="bi bi-question-circle"></i>
                    <span>About us </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/users">
                    <i class="bi bi-person-circle"></i>
                    <span>User Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/customers">
                    <i class="bi bi-person"></i>
                    <span>Customer List</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link collapsed" href="/waiters">
                    <i class="bx bxs-notification"></i>
                    <span>Notifications</span>
                </a>
            </li>
        @endif
        <hr>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @if(auth()->user()->isAdmin != '1')
                    <li>

                        <a href="{{route('resturants.profile', auth()->user()->resturant_branch->id)}}">
                            <i class="bi bi-circle"></i><span>Profile</span>
                        </a>

                    </li>
                @else
                    <li>
                        <a href="/currency">
                            <i class="bi bi-circle"></i><span>Currency</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    @yield('content')

</main><!-- End #main -->


<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>IZI-GET</span></strong>. All Rights Reserved <br>
        Designed & Developed by SpotTech
    </div>

</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>
</html>
