<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    data-layout="vertical" 
    data-topbar="light" 
    data-sidebar-size="lg" 
    data-sidebar="light" 
    data-sidebar-image="none" 
    data-preloader="disable" 
    data-sidebar-visibility="show" 
    data-layout-style="default" 
    data-bs-theme="light" 
    data-layout-width="fluid" 
    data-layout-position="fixed"
>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="shortcut icon" href="{{ asset('website-assets/images/logo.png') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/gridjs/theme/mermaid.min.css') }}">
    <!--Swiper slider css-->
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/gridjs/theme/mermaid.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dropzone.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
</head>

<body class="font-sans antialiased">
    {{-- <x-jet-banner /> --}}

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        {{-- <div class="navbar-brand-box horizontal-logo">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <h3 class="text-dark p-2 fw-bold mt-3">Anant TVS</h3>
                                </span>
                                <span class="logo-lg">
                                    <h3 class="text-dark p-2 fw-bold mt-3">Anant TVS</h3>
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <h3 class="text-dark p-2 fw-bold">Anant TVS</h3>
                                </span>
                                <span class="logo-lg">
                                    <h3 class="text-dark p-2 fw-bold">Anant TVS</h3>
                                </span>
                            </a>
                        </div> --}}

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('website-assets/images/logo.png') }}" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        @if (Auth::user())
                                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                                {{ Auth::user()->name }}
                                            </span>
                                        @else
                                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                                Guest User
                                            </span>
                                        @endif
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                @if (Auth::user())
                                    <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}</h6>
                                @else
                                    <h6 class="dropdown-header">Welcome Guest User</h6>
                                @endif
                                <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i><span
                                        class="align-middle">Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logoutuser') }}" x-data>
                                    @csrf

                                    <x-jet-responsive-nav-link class="dropdown-item" href="{{ route('logoutuser') }}"
                                        @click.prevent="$root.submit();">
                                        <span
                                            class="mdi mdi-logout text-muted fs-16 align-middle me-1">{{ __('Log Out') }}</span>
                                    </x-jet-responsive-nav-link>
                                </form>
                                {{-- <a class="dropdown-item" href="auth-logout-basic.html"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548"
                                style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <h2 class="text-dark p-2 fw-bold mt-3">Anant TVS</h2>
                    </span>
                    <span class="logo-lg">
                        <h2 class="text-dark p-2 fw-bold mt-3">Anant TVS</h2>
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <h2 class="text-dark p-2 fw-bold mt-3">Anant TVS</h2>
                    </span>
                    <span class="logo-lg">
                        <h2 class="text-dark p-2 fw-bold mt-3">Anant TVS</h2>
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            @livewire('navigation-menu')

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        {{-- <div class="vertical-overlay"></div> --}}

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <main>
                {{ $slot }}
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Anant TVS.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Developed by YUVMEDIA
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/libs/gridjs/gridjs.umd.js') }}"></script>
    <script src="{{ asset('assets/js/pages/gridjs.init.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/listjs.init.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('assets/js/pages/ecommerce-product-details.init.js') }}"></script>
    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-file-upload.init.js') }}"></script>

</html>
