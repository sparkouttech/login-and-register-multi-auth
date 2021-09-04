@extends('user-auth::layouts.app-auth')

@section('title')
    {{ __('user-auth::messages.forget-password.title') }}
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
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                                <div class="card-body p-5">
                                    <!-- Auth header with logo image-->
                                    <div class="text-center">
                                        <h1 class="display-5 mb-4">{{ __('user-auth::messages.forget-password.reset_password') }}</h1>
                                    </div>
                                    <!-- Reset password submission form-->
                                    <form method="post" action="{{route('userAuth.check-email')}}">
                                        {{csrf_field()}}
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">{{ __('user-auth::messages.forget-password.email_address') }}</label>
                                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('user-auth::messages.forget-password.enter_email') }}" required>
                                                <small id="emailHelp" class="form-text text-muted">{{ __('user-auth::messages.forget-password.send_email') }}</small>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small fw-500 text-decoration-none" href="login"></a>
                                            <button class="btn btn-primary" href="{{route('userAuth.login.page')}}">{{ __('user-auth::messages.forget-password.reset_password') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Auth card message-->
                            <div class="text-center mb-5"><a class="small fw-500 text-decoration-none link-white" href="{{route('userAuth.register.page')}}">{{ __('user-auth::messages.forget-password.signup') }}</a></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

