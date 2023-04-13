@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/users">Users</a></li>
                <li class="breadcrumb-item active">New User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New User</h5>

                        <!-- Custom Styled Validation -->
                        <form method="POST" class="row g-3 needs-validation" novalidate
                              action="{{ route('users.store') }}"
                              enctype="multipart/form-data" onsubmit="editor()">
                            @csrf
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="name" required>
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="email" class="form-control" id="email"
                                               placeholder="email" required>
                                        <label for="email">Email Address</label>
                                    </div>
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="password" class="form-control" id="password"
                                               placeholder="password" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="col-md-12">
                                    <label for="img" class="form-label">User IMG</label>
                                    <input name="img" id="img" class="form-control" type="file"
                                           onchange="PreviewImage()">
                                </div>


                                <div class="col-md-12" style=" margin-top: 10px;">
                                    <img src="" alt=" " id="uploadPreview"
                                         style="height: 20%; width: 40%;">
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form><!-- End Custom Styled Validation -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        function PreviewImage() {

            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("img").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;

            };


        };

        function editor() {
            document.getElementById("User_text").innerHTML = document.getElementsByClassName("ql-editor")[0].innerHTML;
        }

    </script>

@endsection
