@include('adminViews.header')

<html lang="en">

<style>
    body {
        background: url("../../admin/images/big/bg.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }

</style>
<body>
<div class="home-btn d-none d-sm-block">
    <a href=" {{url('/')}}"><i class="fas fa-home h2 text-dark"></i></a>
</div>

<div class="account-pages mt-5 mb-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                @yield('content')
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

<!-- App js-->
<script src="assets/js/app.min.js"></script>

</body>
</html>
