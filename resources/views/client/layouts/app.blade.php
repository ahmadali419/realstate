<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicons -->
    <link href="../homepage-assets/img/favicon.png" rel="icon">
    <link href="../homepage-assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../homepage-assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Main CSS File -->
    <link href="../homepage-assets/css/style.css" rel="stylesheet">
    @yield('css')
</head>

<body>
    @include('components.header')
    @yield('content')
    @include('components.footer')


    {{-- <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}
            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Vendor JS Files -->
    <script src="../homepage-assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../homepage-assets/vendor/aos/aos.js"></script>
    <script src="../homepage-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../homepage-assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../homepage-assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../homepage-assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../homepage-assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../homepage-assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('js')
</body>

</html>
