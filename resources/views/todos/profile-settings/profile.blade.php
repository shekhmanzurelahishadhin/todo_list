<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>@yield('title')</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    @include('todos.include.style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>

<body class="skin-blue fixed-layout">
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
@include('todos.include.header')

        <div class="container" style="margin-top: 100px">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Personal Information</h4>
                            <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tb-fname"
                                                   placeholder="Enter Name here" name="name" value="{{Auth::user()->name??null}}">
                                            <label for="tb-fname">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="tb-email"
                                                   placeholder="name@example.com" name="email" value="{{Auth::user()->email??null}}">
                                            <label for="tb-email">Email address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="mb-2">Image</label>
                                        <input type="file" name="image" class="form-control">
                                        @if(isset(Auth::user()->profile_photo_path))
                                        <img src="{{asset(Auth::user()->profile_photo_path)}}" width="100px" height="100px" alt="">
                                        @endif

                                    </div>
                                    <div class="col-12 mt-2">
                                            <div class="me-auto mt-3 mt-md-0">
                                                <button type="submit" class="btn btn-primary text-white">Submit</button>
                                            </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <h4 class="card-title">Update Password</h4>
                            <form method="POST" action="{{route('password.update')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tb-fname"
                                                   placeholder="" name="current_password">
                                            <label for="tb-fname">Current Password</label>
                                            @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tb-email"
                                                   placeholder="" name="new_password">
                                            <label for="tb-email">New Password</label>
                                            @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tb-email"
                                                   placeholder="" name="confirm_password">
                                            <label for="tb-email">Confirm Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="me-auto mt-3 mt-md-0">
                                            <button type="submit" class="btn btn-primary text-white">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>


</div>

@include('todos.include.script')
</body>


</html>
