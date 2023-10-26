<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../admin-assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../admin-assets/img/favicon.png">
  <title>
    @yield('title')
  </title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/css/rtl/core.css') }}"  />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/css/rtl/theme-default.css') }}"  />
    <link rel="stylesheet" href="{{ asset('admin-asset/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{asset('admin-asset/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/css/pages/cards-advance.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('admin-asset/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset("admin-asset/vendor/js/template-customizer.js") }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin-asset/js/config.js') }}"></script>
  @yield('css')
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      @include('admin.components.sidebar')
      <div class="layout-page">
        @include('admin.components.header')
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>
        </div>
      </div>
      <!-- Menu -->
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  {{-- <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @yield('content')
   	@include('admin.components.footer')
  </main>
  @include('admin.components.setting')
    <!--   Core JS Files   --> --}}
    
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('admin-asset/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('admin-asset/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('admin-asset/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin-asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{asset('admin-asset/vendor/libs/node-waves/node-waves.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('admin-asset/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('admin-asset/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{asset('admin-asset/vendor/libs/typeahead-js/typeahead.js')}}"></script>

<script src="{{ asset('admin-asset/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('admin-asset/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('admin-asset/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('admin-asset/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('admin-asset/js/main.js') }}"></script>
<script src="{{ asset('admin-asset/vendor/libs/select2/select2.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset("admin-asset/js/dashboards-analytics.js") }}"></script>

<script>
       @if (session('message'))
        // toastr.warning(1);
        toastr.success("{{ session('message') }}", {
            timeOut: 500000000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-bottom-full-width",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        });
    @elseif (session('success'))
        toastr.success("{{ session('success') }}", {
            timeOut: 500000000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-bottom-full-width",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        });
    @elseif (session('error'))
        toastr.error("{{ session('error') }}", {
            timeOut: 500000000,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-bottom-full-width",
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        });
    @endif


 
  // $(document).ready(function(){
  //   $('#datatable').DataTable();
  // });

  
    // $(document).ready(function() {
    //     $('#summernote').summernote();
    // });
    var ctx = document.getElementById("chart-bars").getContext("2d");

    // new Chart(ctx, {
    //   data: {
    //     labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    //       label: "Sales",
    //       tension: 0.4,
    //       borderWidth: 0,
    //       borderRadius: 4,
    //       borderSkipped: false,
    //       backgroundColor: "#fff",
    //       data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
    //       maxBarThickness: 6
    //     }, ],
    //   },
    //   options: {
    //     responsive: true,
    //     maintainAspectRatio: false,
    //     plugins: {
    //       legend: {
    //         display: false,
    //       }
    //     },
    //     interaction: {
    //       intersect: false,
    //       mode: 'index',
    //     },
    //     scales: {
    //       y: {
    //         grid: {
    //           drawBorder: false,
    //           display: false,
    //           drawOnChartArea: false,
    //           drawTicks: false,
    //         },
    //         ticks: {
    //           suggestedMin: 0,
    //           suggestedMax: 500,
    //           beginAtZero: true,
    //           padding: 15,
    //           font: {
    //             size: 14,
    //             family: "Open Sans",
    //             style: 'normal',
    //             lineHeight: 2
    //           },
    //           color: "#fff"
    //         },
    //       },
    //       x: {
    //         grid: {
    //           drawBorder: false,
    //           display: false,
    //           drawOnChartArea: false,
    //           drawTicks: false
    //         },
    //         ticks: {
    //           display: false
    //         },
    //       },
    //     },
    //   },
    // });


    
  </script>
  <script>
  
    @foreach ($errors->all() as $error)
       toastr.error("{{ $error }}")
    @endforeach
  </script>
  @yield('js')
</body>
</html>