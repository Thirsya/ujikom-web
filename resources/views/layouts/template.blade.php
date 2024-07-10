<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="">
    <div class="wrapper ">
        @include('layouts.sidebar')
        <div class="main-panel">
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <script src="../assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            demo.initChartsPages();
        });
    </script>
</body>

</html>
