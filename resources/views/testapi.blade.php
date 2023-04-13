@extends('layouts.app')

@section('content')


    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-12">
                <button id="home" class="btn btn-primary">home</button>
                <button id="food" class="btn btn-primary">Food</button>
                <button id="send" class="btn btn-primary">send order</button>
                <button id="order_list" class="btn btn-primary">order_list</button>
                <button id="waiter" class="btn btn-primary">call for waiter</button>
                <button id="scan" class="btn btn-primary">scan</button>
                <button id="profile" class="btn btn-primary">profile</button>
                <button id="feedback" class="btn btn-primary">feedback</button>
                <button id="search" class="btn btn-primary">search</button>
                <button id="login" class="btn btn-primary">login</button>
                <button id="register" class="btn btn-primary">register</button>
                <button id="send-verify" class="btn btn-primary">send-verify</button>
                <button id="verify" class="btn btn-primary">verify</button>
            </div>
            <br><br>
            <div class="col-12">
                <button id="social" class="btn btn-primary">social</button>
                <button id="info" class="btn btn-primary">info</button>
                <button id="edit" class="btn btn-primary">edit</button>
                <button id="reset" class="btn btn-primary">reset pass</button>
                <button id="forgot" class="btn btn-primary">forgot pass</button>
                <button id="forgot_verify" class="btn btn-primary">forgot verify</button>
                <button id="forgot_reset" class="btn btn-primary">forgot reset</button>
            </div>
            <!-- Left side columns -->
        </div>
    </section>

    <script>
        var order = [
            {'quantity': '1', 'tbl_id': '4', 'menu_id': '6', 'size_id': '6', 'customer': '3543423434234324'},
        ];

        $("#home").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/home/8",
                data: {},
                dataType: "json",
                success: function (result) {
                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });
        $("#food").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/foods/5",
                data: {},
                dataType: "json",
                success: function (result) {
                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });
        $("#send").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/send-orders",
                data: {
                    orders: order
                },
                dataType: "json",
                success: function (result) {


                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });
        $("#order_list").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/order/list/4",
                data: {},
                dataType: "json",
                success: function (result) {
                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });
        $("#waiter").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/call-waiter",
                data: {
                    tbl_id: '2',
                    customer: '10325213354342345321211969',
                },
                dataType: "json",
                success: function (result) {
                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });
        $("#scan").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/home/2",
                data: {},
                dataType: "json",
                success: function (result) {
                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });

        $("#profile").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/profile/2",
                data: {},
                dataType: "json",
                success: function (result) {
                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });
        $("#feedback").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/feedback/send",
                data: {
                    first_name: 'Masihullah',
                    last_name: 'Khairy',
                    phone: '0093788888888',
                    email: 'masihullah@gmail.com',
                    message: 'Hello world!',
                    rate: '5',
                },
                dataType: "json",
                success: function (result) {
                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });
        $("#search").click(function () {

            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/search/pizza",
                data: {
                    tbl_id: '2',
                    rate: '5',
                },
                dataType: "json",
                success: function (result) {
                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });

        });


        $("#login").click(function () {
            $.post("api/customer-login",
                {
                    email: 'masih@gmail.com',
                    password: 'admin@123',
                    _token: $("meta[name='csrf-token']").attr('content')
                },
                function (data, status) {
//                    alert("Data: " + data + "\nStatus: " + status);
                });
        });
        $("#register").click(function () {
            $.post("api/register",
                {
                    full_name: 'Ali Yaqobi',
                    email: 'ali211@gmail.com',
                    password: 'admin@123',
                    _token: $("meta[name='csrf-token']").attr('content')
                },
                function (data, status) {
//                    alert("Data: " + data + "\nStatus: " + status);
                });
        });


        $("#send-verify").click(function () {
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
                    verification_code: '967656',
                    _token: $("meta[name='csrf-token']").attr('content')
                },
                function (data, status) {
//                    alert("Data: " + data + "\nStatus: " + status);
                });
        });
        $("#social").click(function () {
            $.post("api/social",
                {
                    full_name: 'masihullah Khairy',
                    email: 'ali11@gmail.com',
                    social_provider: 'ali1@gmail.com',
                    img_path: 'ali1@gmail.com',
                    social_token: 'ali1@gmail.com',
                    _token: $("meta[name='csrf-token']").attr('content')
                },
                function (data, status) {
//                    alert("Data: " + data + "\nStatus: " + status);
                });
        });

        $("#info").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "GET",
                url: "api/user/info",
                data: {},
                dataType: "json",
                success: function (result) {

                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });

        });

        $("#edit").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/user/edit",
                data: {
                    email : 'masihkhairy@gmail.com',
                    full_name : 'Masihullah Khairy 3',
                    img_path : 'defaul.png'
                },
                dataType: "json",
                success: function (result) {

                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });

        $("#reset").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/user/reset-password",
                data: {
                    email : 'masihkhairy@gmail.com',
                    current_pass : 'admin@123',
                    new_pass : 'admin@1232'
                },
                dataType: "json",
                success: function (result) {

                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });

        $("#forgot").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/user/forgot-password",
                data: {
                    email : 'masihkhairy@gmail.com',
                },
                dataType: "json",
                success: function (result) {

                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });
        $("#forgot_verify").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/user/forgot-password-verify",
                data: {
                    email : 'masihkhairy@gmail.com',
                    reset_code : '518378'
                },
                dataType: "json",
                success: function (result) {

                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });

        $("#forgot_reset").click(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'token': '$2y$10$e6tbgQSbvmC6X7us57XsIeuBZT7eZYqiu/zDTKjKNX4KL9wQEOvEG'
                },
                type: "POST",
                url: "api/user/forgot-password-reset",
                data: {
                    email : 'masihkhairy@gmail.com',
                    new_pass : 'admin@123'
                },
                dataType: "json",
                success: function (result) {

                },
                error: function (req, status, error) {
                    console.log(error);
                }
            });
        });
    </script>
@endsection
