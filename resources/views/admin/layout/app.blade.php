<!DOCTYPE html>
<html lang="en">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/toastr/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/custom.css') }}">
    {{-- <link rel='shortcut icon' type='image/x-icon' href='{{ asset('public/admin/assets/images/logo1.png') }}' /> --}}
    <link rel="stylesheet"
        href="{{ asset('public/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/bundles/datatables/datatables.min.css') }}">

</head>

<body>
    <div class="loader"></div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('admin.common.header')
            @include('admin.common.side_menu')
            @yield('content')
            @include('admin.common.footer')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateOffersCounter() {
            $.ajax({
                url: "{{ route('offers.count') }}",
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    
                     // Ensure response.count exists and handle counts over 99
                    let count = response.count || 0; // Default to 0 if no count is returned
                    $('#offersCounter').text(count > 99 ? '99+' : count);
                    // $('#orderCounter').text(response.count);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        updateOffersCounter();
        setInterval(updateOffersCounter, 1000);
        function updateUpComingCounter() {
            $.ajax({
                url: "{{ route('up-coming.count') }}",
                type: 'GET',
                success: function(response) {
                     // Ensure response.count exists and handle counts over 99
                    let count = response.count || 0; // Default to 0 if no count is returned
                    $('#upComingRidesCounter').text(count > 99 ? '99+' : count);
                    // $('#orderCounter').text(response.count);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        updateUpComingCounter();
        setInterval(updateUpComingCounter, 1000);
        function updatePastCounter() {
            $.ajax({
                url: "{{ route('past-rides.count') }}",
                type: 'GET',
                success: function(response) {
                     // Ensure response.count exists and handle counts over 99
                    let count = response.count || 0; // Default to 0 if no count is returned
                    $('#pastRidesCounter').text(count > 99 ? '99+' : count);
                    // $('#orderCounter').text(response.count);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        updatePastCounter();
        setInterval(updatePastCounter, 1000);
        function updateOrderCounter() {
            $.ajax({
                url: "{{ route('chauffer.requests.count') }}",
                type: 'GET',
                success: function(response) {
                     // Ensure response.count exists and handle counts over 99
                    let count = response.count || 0; // Default to 0 if no count is returned
                    $('#requestCounter').text(count > 99 ? '99+' : count);
                    // $('#orderCounter').text(response.count);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        updateOrderCounter();
        setInterval(updateOrderCounter, 1000);

        function updateDeleteRequestCounter() {
            $.ajax({
                url: "{{ route('delete.account.requests') }}",
                type: 'GET',
                success: function(response) {
                     // Ensure response.count exists and handle counts over 99
                    let count = response.count || 0; // Default to 0 if no count is returned
                    $('#deleteRequestCounter').text(count > 99 ? '99+' : count);
                    // $('#orderCounter').text(response.count);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        updateDeleteRequestCounter();
        setInterval(updateDeleteRequestCounter, 1000);

        function notificationCounter() {
            $.ajax({
                url: "{{ route('notification.counter') }}",
                type: 'GET',
                success: function(response) {
                     // Ensure response.count exists and handle counts over 99
                    let count = response.count || 0; // Default to 0 if no count is returned
                    $('#notificationsCounter').text(count > 99 ? '99+' : count);
                    // $('#orderCounter').text(response.count);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        notificationCounter();
        setInterval(notificationCounter, 1000);
    </script>
    <!-- General JS Scripts -->
    <script src="{{ asset('public/admin/assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('public/admin/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('public/admin/assets/js/page/index.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('public/admin/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('public/admin/assets/js/custom.js') }}"></script>
    <script src="{{ asset('public/admin/assets/toastr/js/toastr.min.js') }}"></script>
     {{-- DataTbales --}}
     <script src="{{ asset('public/admin/assets/bundles/datatables/datatables.min.js') }}"></script>
     <script src="{{ asset('publicadmin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
     </script>
     <script src="{{ asset('public/admin/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/page/datatables.js') }}"></script>
        </script>
        <script >
            /*toastr popup function*/
            function toastrPopUp() {
                toastr.options = {
                    "closeButton": true,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "3000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            }

        /*toastr popup function*/
        toastrPopUp();
    </script>
    @yield('js')
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
