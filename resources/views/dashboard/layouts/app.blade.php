@php
    use App\SEO\Metadata;
@endphp

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ $dashboards_assets }}/" data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="description" content="{{Metadata::DEFALT_META_DESCRIPTION}}" />
    <meta property="og:site_name" content="{{Metadata::DEFALT_META_TITLE}}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $dashboards_assets }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ $dashboards_assets }}/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ $dashboards_assets }}/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ $dashboards_assets }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ $dashboards_assets }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ $dashboards_assets }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ $dashboards_assets }}/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ $dashboards_assets }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ $dashboards_assets }}/js/config.js"></script>

    <style>
        .reading-list {
            border-left: 10px solid blue;
            border-radius: 10px;
            margin-bottom: 30px;
            padding: 8px;
            background: gray;
            color: white;
            font-size: 20px;
            text-transform: uppercase
        }

        .img-fluid {
            width: 150px;
            height: 15vh;
            padding: 8px, 0px, 0px , 8px;
        }

        .admin{
            background:blue;
        }

        @media screen (min-with:700px) {
            .img-fluid {
                width: 400px;
                height: 20vh;
                ;
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('dashboard.layouts.include.sidebar')

            <!-- Layout container -->
            <div class="layout-page">
                @include('dashboard.layouts.include.navbar')
                @yield('content')
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('dashboard.layouts.include.footer')
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ $dashboards_assets }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ $dashboards_assets }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ $dashboards_assets }}/vendor/js/bootstrap.js"></script>
    <script src="{{ $dashboards_assets }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ $dashboards_assets }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ $dashboards_assets }}/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ $dashboards_assets }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ $dashboards_assets }}/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>


</html>
