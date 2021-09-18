@extends('user-auth::layouts.app-auth')

@section('title')
    {{ __('user-auth::messages.login.heading') }}
@endsection

@section('content')
    @foreach($errors->all() as $key => $error)
        @if($key == 0)
            <div id="toast-error" class="error-alert-show toast align-items-center position-absolute top-0 end-0"
                 role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{$error}}
                    </div>
                    <button type="button" onclick="dismissErrorToast();" class="btn-close me-2 m-auto"
                            data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
    @endforeach
    <div id="layoutAuthentication">
        <!-- Layout content-->
        <div id="layoutAuthentication_content">
            <!-- Main page content-->
            <main>
                <!-- Main content container-->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                                <div class="card-body p-5">
                                    <!-- Auth header -->
                                    <div class="text-center">
                                        <h1 class="display-5 mb-0">Welcome to dashboard</h1>
                                        <div class="subheading-1 mb-5"></div>
                                    </div>

                                </div>
                            </div>
                            <!-- Auth card message-->
                            <div class="text-center mb-5"><a class="small fw-500 text-decoration-none link-white"
                                                             href="signout">{{ __('user-auth::messages.login.logout') }}</a></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
