<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/avatar.png') }}" alt="">{{ ucwords(Auth::user()->name)}}
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{ url('/') }}" target="_blank">Visit Site</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="post" id="logout-form">
                                {{ csrf_field() }}
                            </form>
                            <a href="#" onclick="document.getElementById('logout-form').submit()">
                                Logout <i class="fa fa-sign-out pull-right"></i> </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>