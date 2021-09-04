<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>
            @yield('title','Bank less kingdom')
        </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>
        <!-- Load Material Icons from Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Roboto and Roboto Mono fonts from Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Load main stylesheet-->
        <link href="{{asset('user-auth/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('user-auth/css/common.css')}}" rel="stylesheet" />
</head>
<body class="bg-primary">
    @if(session()->has('error'))
        <div id="toast-error" class="error-alert-show toast align-items-center position-absolute top-0 end-0"
             role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session()->get('error') }}
                </div>
                <button type="button" onclick="dismissErrorToast();" class="btn-close me-2 m-auto"
                        data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if(session()->has('success'))
        <div id="toast-error" class="success-alert-show toast align-items-center position-absolute top-0 end-0"
             role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session()->get('success') }}
                </div>
                <button type="button" onclick="dismissErrorToast();" class="btn-close me-2 m-auto"
                        data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if(session()->has('message'))
        <div id="toast-error" class="message-alert-show toast align-items-center position-absolute top-0 end-0"
             role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session()->get('message') }}
                </div>
                <button type="button" onclick="dismissErrorToast();" class="btn-close me-2 m-auto"
                        data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
        @yield('content')
        <!-- Load Bootstrap JS bundle-->
        <script src="{{asset('user-auth/js/bootstrap.bundle.min.js')}}" ></script>
        <!-- Load global scripts-->
        <script type="module" src="{{ asset('user-auth/js/material.js') }}"></script>
        <script src="{{asset('user-auth/js/common.js')}}"></script>
</body>

</html>
