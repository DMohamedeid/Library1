
<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            {{--            Search area--}}
            <li class="d-none d-sm-block">
                <form action="{{route('search')}}" method="get" class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" name="search" id = "search"  value="{{request()->input('search')}}" class="form-control" placeholder="search....">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            {{--            End of search area--}}

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="dropdown notification-list">

                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                        <img src="{{asset('/storage/User/Images/' . Auth::user()->image)}}" alt="image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                                {{Auth::user()->username}} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="{{route('user.show' , Auth::user()->id)}}" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span> Profile </span>
                        </a>

                        <a href="{{route('user.edit' , Auth::user()->id)}}" class="dropdown-item notify-item">
                            <i class="fas fa-user-cog"></i>
                            <span>Manage Profile </span>
                        </a>


                        <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                            <i class="fe-log-out"></i>
                            <span>Log Out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>

            @endguest


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="/" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('admin/images/logo-dark.png')}}" alt="" height="16">
                            <!-- <span class="logo-lg-text-light">Xeria</span> -->
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="{{asset('admin/images/logo-sm.png')}}" alt="" height="24">
                        </span>
            </a>
        </div>

{{--        end logo--}}

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile disable-btn waves-effect">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <h4 class="page-title-main fas fa-book-open"> Library</h4>
                <li class="fas fa-books"></li>
            </li>
        </ul>
    </div>
    <!-- end Topbar -->
</div>
