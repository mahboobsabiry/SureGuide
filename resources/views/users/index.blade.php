@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = Session::get('unsuccess'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <section class="section dashboard">
        <div class="row">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <button data-bs-toggle="modal"
                                        data-bs-target="#createModal"
                                        class="btn btn-outline-success btn-sm bx-pull-right"> New User <i
                                            class="bi bi-plus"></i></button>

                                <div class="col-lg-3 mb-3">
                                    <form class=" d-flex align-items-center" method="GET" action="/users">
                                        <input type="text" class="form-control" name="query" placeholder="Search"
                                               title="Enter search keyword">
                                        {{--<button type="submit" title="Search" class="input-group-text"><i class="bi bi-search"></i></button>--}}
                                    </form>
                                </div>

                                <!-- Table with stripped rows -->
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>IMG</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td><img src="{{ asset('images/users/' . $user->img) }}" alt=""
                                                     style="height: 50px; width: 50px; border-radius: 10px;"></td>
                                            <td>{{ $user->email }}</td>
                                            <td colspan="2">
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete?')">
                                                    <a class="btn btn-outline-success btn-sm"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#editModal{{$user->id}}"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-secondary btn-sm" type="submit"><i
                                                                class="bi bi-trash-fill"></i></button>

                                                </form>
                                                {{--edit user modal--}}
                                                <div class="modal fade" id="editModal{{$user->id}}" tabindex="-1">
                                                    <div class="modal-dialog ">
                                                        <!-- Custom Styled Validation -->
                                                        <form method="POST" class="row g-3 needs-validation" novalidate
                                                              action="{{ route('users.update', $user->id) }}"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit User</h5>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="col-md-12">
                                                                                <div class="form-floating">
                                                                                    <input type="text" name="name"
                                                                                           class="form-control"
                                                                                           id="name" value="{{$user->name}}"
                                                                                           placeholder="name" required>
                                                                                    <label for="name">Name</label>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="col-md-12">
                                                                                <div class="form-floating">
                                                                                    <input type="text" name="email"
                                                                                           class="form-control"
                                                                                           id="email" value="{{$user->email}}"
                                                                                           placeholder="email" required>
                                                                                    <label for="email">Email
                                                                                        Address</label>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="col-md-12">
                                                                                <div class="form-floating">
                                                                                    <input type="password" name="password"
                                                                                           class="form-control"
                                                                                           id="password"
                                                                                           placeholder="password"
                                                                                           required>
                                                                                    <label for="password">Password</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="col-md-12">
                                                                                <label for="img" class="form-label">User
                                                                                    IMG</label>
                                                                                <input name="img" id="{{$user->id}}"
                                                                                       class="form-control img"
                                                                                       type="file">
                                                                            </div>
                                                                            <div class="col-md-12"
                                                                                 style=" margin-top: 10px;">
                                                                                <img src="{{ asset('images/users/' . $user->img) }}"
                                                                                     alt="" class="rounded"
                                                                                     id="uploadPreview{{$user->id}}"
                                                                                     style="height: 20%; width: 40%;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit">
                                                                        Save
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form><!-- End Custom Styled Validation -->
                                                    </div>
                                                </div><!-- End Resturant Modal-->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                                {!! $users->links() !!}
                            </div>

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </section>

    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog ">
            <!-- Custom Styled Validation -->
            <form method="POST" class="row g-3 needs-validation" novalidate
                  action="{{ route('users.store') }}"
                  enctype="multipart/form-data" onsubmit="editor()">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New User</h5>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
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

                            <div class="col-6">
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </div>
            </form><!-- End Custom Styled Validation -->
        </div>
    </div><!-- End Resturant Modal-->

    <script type="text/javascript">

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("img").files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;

            };
        };

        $('.img').change(function () {
            var id = $(this).attr('id');
            var uploadPreview = 'uploadPreview' + id;

            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById(id).files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById(uploadPreview).src = oFREvent.target.result;

            };
        })

    </script>

@endsection
