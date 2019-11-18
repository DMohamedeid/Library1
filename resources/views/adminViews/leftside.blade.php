<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">


                <li>
                    <a href="{{url('/')}}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Home Page </span>
                    </a>
                </li>
                @hasRole(['superadmin' , 'admin' , 'author'])
                <li>
                    <a href="javascript: void(0);">
                        <i class=" fa fa-users"></i>
                        <span> Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li> <a href="{{route('users.index')}}"> <i class=" fa fa-users"></i>  All Users</a></li>

{{--                        <li><a href="{{url('adminpanel/users/create')}}"><i class="fas fa-user-plus"></i>  Create User</a></li>--}}
                    </ul>
                </li>
                @endhasRole

                <li>
                    <a href="{{route('category.index')}}">
                        <i class="fas fa-list-alt"></i>
                        <span> Category </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-address-book"></i>
                        <span> Books </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li> <a href="{{route('book.index')}}"> <i class="fas fa-book-dead"></i>  All Books</a></li>

                        @hasRole(['superadmin' , 'admin' , 'author'])
                        <li><a href="{{route('book.create')}}"><i class="fas fa-upload"></i>Upload New Book </a></li>
                        @endhasRole
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
