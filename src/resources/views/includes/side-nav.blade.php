<div id="layoutDrawer_nav">
    <!-- Drawer navigation-->
    <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
        <div class="drawer-menu">
            <div class="nav">
                <!-- Drawer section heading (Interface)-->
                <div class="drawer-menu-heading">Tools</div>
                <!-- Drawer link (Overview)-->
                <a class="nav-link {{ request()->is('/') ? 'active' : ''}}" href="{{url('/')}}/">
                    <div class="nav-link-icon"><i class="material-icons"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ request()->is('blog*') ? 'active' : ''}}" href="{{url('/')}}/blog">
                    <div class="nav-link-icon"><i class="material-icons"></i></div>
                    Blog
                </a>
                <a class="nav-link {{ request()->is('ipo*') ? 'active' : ''}}" href="{{url('/')}}/ipo">
                    <div class="nav-link-icon"><i class="material-icons">description</i></div>
                    IPO
                </a>
                <a class="nav-link" rel="noreferrer" href="https://imjo.in/wpsC6k" target="_blank">
                    <div class="nav-link-icon"><i class="material-icons"></i></div>
                    Donate
                </a>
                <!-- Divider-->
                <div class="drawer-menu-divider"></div>

                @if(session()->has('user'))
                    <!-- Drawer section heading (Interface)-->
                    <div class="drawer-menu-heading">Jarvis Bot</div>
                    <!-- Drawer link (Overview)-->
                    <a class="nav-link {{ request()->is('jarvis/setup') ? 'active' : ''}}" href="{{url('/')}}/jarvis/setup">
                        <div class="nav-link-icon"><i class="material-icons"></i></div>
                        Setup
                    </a>
                    <a class="nav-link {{ request()->is('jarvis/orders*') ? 'active' : ''}}" href="{{url('/')}}/jarvis/orders">
                        <div class="nav-link-icon"><i class="material-icons"></i></div>
                        Orders
                    </a>
                    <a class="nav-link {{ request()->is('jarvis/log*') ? 'active' : ''}}" href="{{url('/')}}/jarvis/log">
                        <div class="nav-link-icon"><i class="material-icons">description</i></div>
                        Log
                    </a>
                    <!-- Divider-->
                    <div class="drawer-menu-divider"></div>
                @endif

                <!-- Drawer section heading (About NFT)-->
                <div class="drawer-menu-heading">About NFT</div>
                <!-- Drawer link (Components)-->
                <a class="nav-link {{ request()->is('help*') ? 'active' : ''}}" href="{{url('/')}}/help">
                    <div class="nav-link-icon"><i class="material-icons leading-icon">help</i></div>
                    Help
                </a>
                <a class="nav-link {{ request()->is('terms-conditions*') ? 'active' : ''}}" href="{{url('/')}}/" >
                    <div class="nav-link-icon"><i class="material-icons">build</i></div>
                    Terms &amp; Conditions
                </a>
                <a class="nav-link {{ request()->is('privacy-policy*') ? 'active' : ''}}" href="{{url('/')}}/" >
                    <div class="nav-link-icon"><i class="material-icons">dashboard</i></div>
                    Privacy policy
                </a>                
            </div>
        </div>
    </nav>
</div>