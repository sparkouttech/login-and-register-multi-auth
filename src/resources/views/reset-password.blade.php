@extends('user-auth::layouts.app-auth')

@section('title', 'Reset password')

@section('content')
    <div id="layoutAuthentication">
        <!-- Layout content-->
        <div id="layoutAuthentication_content">
            <!-- Main page content-->
            <main>
                <!-- Main content container-->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                                <div class="card-body p-5">
                                    <!-- Auth header with logo image-->
                                    <div class="text-center">
                                        <h1 class="display-5 mb-4">Reset Password</h1>
                                    </div>
                                    <!-- Reset password submission form-->
                                    @if (count($errors) > 0)
                                        <div class = "alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" action="{{route('set-password')}}">
                                        {{csrf_field()}}
                                        <input type = "hidden" name = "id" value="{{$id}}">
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Enter new Password</label>
                                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Enter password" required>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">Verify Password</label>
                                                <input type="password" class="form-control" name="verifyPassword" id="exampleInputPassword2" aria-describedby="emailHelp" placeholder="Verify password" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small fw-500 text-decoration-none" href="{{route('userAuth.login')}}"></a>
                                            <button class="btn btn-primary">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Auth card message-->
                            <div class="text-center mb-5"><a class="small fw-500 text-decoration-none link-white" href="register">Need an account? Sign up!</a></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

@endsection
