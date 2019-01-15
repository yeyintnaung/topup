<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Start top bar header\\\\\\\\\\\\\\\\\\\\\\\-->
<header id="header" class="top-bar">
    <div class="navbar-fixed">
        <nav class="indigo">
            <div class="nav-wrapper">
                <ul class="left">                      
                    <li>
                        <h1 class="logo-wrapper center-align">
                            <a href="{{asset('/')}}" class="brand-logo">The Banyan Topup</a>
                        </h1>
                    </li>
                </ul>

                <ul class="right col s9 m3 nav-right-menu">
                    <li class="hide-on-med-and-down"><a href="javascript:void(0)" data-activates="dropdown2" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i><span class="badge red">3</span></a></li>
                    <li class="hide-on-med-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">email</i><span class="badge blue">4</span></a></li>
                    <li><a class='dropdown-button  dropdown-right' href='#' data-activates='dropdown'>
                        <img src="{{asset('images/avatar-03.png')}}" alt="" width="40"></a>
                    </li>
                    <li><a href="javascript:void(0)" data-activates="right-sidebar" class="right-sidebar-button waves-effect waves-light"><i class="material-icons">chat</i></a></li>
                </ul>
                
                <!-- Dropdown Structure -->
                <ul class="right col s9 m3 nav-right-menu">
                    <li>{{ Auth::user()->name }}</li>
                </ul >
                        
                <ul id='dropdown1' class='dropdown-content notifications-dropdown'>
                    <li class="notification-header">                               
                        4 New Messages
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/avatar-01.png" alt="" width="40" class="left">
                            <div class="notify-content">
                                <span class="notify-title">John Started Following You</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.   
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/avatar-08.png" alt="" width="40" class="left">
                            <div class="notify-content">
                                <span class="notify-title">Kalia assign a task</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.   
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="center-align">View All</a>
                    </li>
                </ul>
                <ul id='dropdown2' class='dropdown-content notifications-dropdown'>
                    <li class="notification-header">                               
                        3 New Alerts
                    </li>
                    <li>
                        <a href="#">
                            <i class="material-icons left red-text">warning</i>
                            <div class="notify-content">
                                <span class="notify-title red-text">Disc storage is low</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.   
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="center-align">View All</a>
                    </li>
                </ul>
                <ul id='dropdown' class='dropdown-content profile-dropdown'>
                    <li><a href="#!">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#!">Settings</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                             Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\End top bar header\\\\\\\\\\\\\\\\\\\\\\\-->