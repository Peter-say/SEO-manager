<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ $web_assets }}/" data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $web_assets }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ $web_assets }}/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ $web_assets }}/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ $web_assets }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ $web_assets }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ $web_assets }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ $web_assets }}/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ $web_assets }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ $web_assets }}/js/config.js"></script>

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

        .aside{
            border-left: 5px solid black;
        }

        .aside, h3{
            text-align: center;
            /* text-decoration: underline; */
        }

        .content-box{
            border: 2px solid blue;
           
        }

        .content-box, h5 , p{
            text-decoration: none;
        }

        .img-fluid {
            width: 350px;
            height: 25vh;
            ;
            padding: 8px;
        }

        .comment{
            border: 2px solid black;
            padding: 10px;
            margin-top: 20px;
        }

        
        #comment-text-area {
            border: 1px solid gray;
            border-radius: 10px;
            padding: 5px;
            font-size: 20px
        }

        #article-text{
            font-size: 20px;
            line-height: 7vh;
            font-family: Georgia, 'Times New Roman', Times, serif
        }

        .blog-detail-image{
            width: 100%;
            height: 70vh;
            margin: 5px;
            border-radius: 8px;
        }
        
        .blog_time-stamp, span{
        padding-right: 12px;
        }

        @media screen (min-with:700px) {
            .img-fluid {
                width: 400px;
                height: 25vh;
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

            @include('web.layouts.include.sidebar')

            <!-- Layout container -->
            <div class="layout-page">
                @include('web.layouts.include.navbar')
                @yield('content')
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('web.layouts.include.footer')
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ $web_assets }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ $web_assets }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ $web_assets }}/vendor/js/bootstrap.js"></script>
    <script src="{{ $web_assets }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ $web_assets }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ $web_assets }}/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ $web_assets }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ $web_assets }}/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
