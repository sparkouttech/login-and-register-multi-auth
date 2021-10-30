@extends('user-auth::layouts.app-auth')

@section('title')
    {{ __('user-auth::messages.register.title') }}
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
                            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-5">
                                <div class="card-body p-5">
                                    <!-- Auth header with logo image-->
                                    <div class="text-center">
                                        <h1 class="display-5 mb-0">{{ __('user-auth::messages.register.new_account') }}</h1>
                                        <div class="subheading-1 mb-5"></div>
                                    </div>
                                    <!-- Register new account form-->
                                    <form action="{{route('userAuth.register')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">{{ __('user-auth::messages.register.name') }} *</label>
                                                <input type="text" required class="form-control" name="name" id="exampleInputName1" placeholder="{{ __('user-auth::messages.register.enter_name') }}">
                                            </div>
                                        </div>
                                        {{-- <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">{{ __('user-auth::messages.register.l_name') }} *</label>
                                                <input type="text" required class="form-control" name="name" id="exampleInputName1" placeholder="{{ __('user-auth::messages.register.enter_last_name') }}">
                                            </div>
                                        </div> --}}
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">{{ __('user-auth::messages.register.email_address') }}@if(config('user-auth.login_type') == "email")*@endif </label>
                                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('user-auth::messages.register.enter_email') }}" @if(config('user-auth.login_type') == "email") required @endif >
                                                <small id="emailHelp" class="form-text text-muted">{{ __('user-auth::messages.register.email_privacy_info') }}</small>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="phone">{{ __('user-auth::messages.register.phone_number') }}@if(config('user-auth.login_type') == "phone")*@endif</label>
                                                <input type="text" class="form-control" name="phone_number" id="phone" placeholder="{{ __('user-auth::messages.register.enter_phone_number') }}" @if(config('user-auth.login_type') == "phone") required @endif >
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">{{ __('user-auth::messages.register.password') }} *</label>
                                                <input type="password" required class="form-control" name="password" id="exampleInputPassword1" placeholder="{{ __('user-auth::messages.register.enter_password') }}">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">{{ __('user-auth::messages.register.confirm_password') }} *</label>
                                                <input type="text" required class="form-control" name="name" id="exampleInputName1" placeholder="{{ __('user-auth::messages.register.enter_confirm_password') }}">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small fw-500 text-decoration-none" href="{{route('userAuth.login')}}">{{ __('user-auth::messages.register.signin') }}</a>
                                            <button type="submit" class="btn btn-primary">{{ __('user-auth::messages.register.register') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

@endsection

