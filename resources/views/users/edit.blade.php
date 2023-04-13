@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Users">Users</a></li>
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit User</h5>

                        <!-- Custom Styled Validation -->
                        <form method="POST" class="row g-3 needs-validation" novalidate
                              action="{{ route('users.update' , $users->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="name" required value="{{ $users->name }}">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="email" class="form-control" id="email"
                                               placeholder="email" value="{{ $users->email }}" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control" id="password"
                                               placeholder="password" value="" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <br>

                            </div>

                            <div class="col-md-6">

                                <div class="col-md-12">
                                    <label for="img" class="form-label">User IMG</label>
                                    <input name="img" id="img" class="form-control" type="file"
                                           onchange="PreviewImage()">
                                </div>


                                <div class="col-md-12" style=" margin-top: 10px;">
                                    <img src="/public/image/users/{{$users->img}}" alt=" " id="uploadPreview"
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


    </script>

@endsection
