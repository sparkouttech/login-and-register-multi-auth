<nav class="top-app-bar navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid px-4">
        <!-- Drawer toggle button-->
        <button class="btn btn-lg btn-icon order-1 order-lg-0" id="drawerToggle" href="javascript:void(0);"><i class="material-icons">menu</i></button>
        <!-- Navbar brand-->
        <a class="navbar-brand me-auto" href="{{url('/')}}/"><div class="text-uppercase font-monospace">Nifty Fifty Traders</div></a>
        <!-- Navbar items-->
        <div class="d-flex align-items-center mx-3 me-lg-0">
            <!-- Navbar-->
            @if(session()->has('user'))
            <!-- Navbar buttons-->
            <div class="d-flex">
                <!-- Notifications and alerts dropdown-->
                <div class="dropdown dropdown-notifications d-none d-sm-block">
                    <button class="btn btn-lg btn-icon dropdown-toggle me-3" id="dropdownMenuNotifications" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">notifications</i></button>
                    <ul class="dropdown-menu dropdown-menu-end me-3 mt-3 py-0 overflow-hidden" aria-labelledby="dropdownMenuNotifications">
                        <li><h6 class="dropdown-header bg-primary text-white fw-500 py-3">Notifications</h6></li>
                        <li><hr class="dropdown-divider my-0" /></li>
                        <li>
                            <a class="dropdown-item unread mdc-ripple-upgraded" href="#!" style="--mdc-ripple-fg-size:192px; --mdc-ripple-fg-scale:1.76374; --mdc-ripple-fg-translate-start:34.2858px, -66px; --mdc-ripple-fg-translate-end:64px, -58.5714px;">
                                <div class="dropdown-item-content me-2">
                                    <div class="dropdown-item-content-text">No Notifications</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- User profile dropdown-->
                <div class="dropdown">
                    <button class="btn btn-lg btn-icon dropdown-toggle" id="dropdownMenuProfile" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">person</i></button>
                    <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownMenuProfile">
                        <li>
                            <a class="dropdown-item" href="{{url('/')}}/user/{{session()->get('user')->id}}">
                                <i class="material-icons leading-icon">person</i>
                                <div class="me-3">Profile</div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#!">
                                <i class="material-icons leading-icon">settings</i>
                                <div class="me-3">Settings</div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{url('/')}}/help">
                                <i class="material-icons leading-icon">help</i>
                                <div class="me-3">Help</div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="{{route('logout')}}">
                                <i class="material-icons leading-icon">logout</i>
                                <div class="me-3">Logout</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @else
                <a href="{{url('/')}}/login" style="background-color: white !important;color: black !important;" class="btn btn-secondary">Login</a>
            @endif
        </div>
    </div>
</nav>