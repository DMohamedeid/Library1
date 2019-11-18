
@include('adminViews.header')

@include('adminViews.navbar')

@include('adminViews.leftside')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <div class="content" style="margin-right: 35px">
        @include('partiales.alerts')
        @yield('content')
    </div> <!-- content -->
    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2016 - 2019 &copy; Adminto theme by <a href="">Coderthemes</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->


@include('adminViews.rightside')

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

@include('adminViews.footer')
