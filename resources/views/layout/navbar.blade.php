<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="collapse navbar-collapse show" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                    <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide"
                            data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                        <ul class="dropdown-menu pb-0">
                            <li class="arrow_box">
                                <form>
                                    <div class="input-group search-box">
                                        <div class="position-relative has-icon-right full-width">
                                            <input class="form-control" id="search" type="text"
                                                placeholder="Search here...">
                                            <div class="form-control-position navbar-search-close"><i
                                                    class="ft-x"> </i></div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown"> <span class="avatar avatar-online"><img
                                    src="{{ asset('images/portrait/small/avatar-s-19.png') }}"
                                    alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right pb-0">
                            <div class="arrow_box_right">
                                <a class="dropdown-item" href="#">
                                    <span class="avatar avatar-online row">
                                        <img src="{{ asset('images/portrait/small/avatar-s-19.png') }}" alt="avatar">
                                        <span class="user-name text-bold-700 ml-1">
                                            {{ Auth::user()->employe->prenom }}
                                        </span>
                                    </span></a>
                                <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                                <form id="logoutForm" action="/logout" method="post">@csrf</form>
                                <a class="dropdown-item btn btn-danger btn-min-width mr-1" href="#"
                                    onclick="document.getElementById('logoutForm').submit()"><i
                                        class="ft-power"></i> Deconnecter</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

