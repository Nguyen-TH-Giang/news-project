<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/backend/img/favicon.png" rel="icon">
    <link href="/backend/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/backend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/backend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/backend/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/backend/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/backend/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/backend/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/backend/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/admin" class="logo d-flex align-items-center">
                <img src="/backend/img/logo.png" alt="">
                <span class="d-none d-lg-block">Digital Magazine</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="javascript:void(0)" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->name }}</h6>
                            <span>{{ auth()->user()->email }}</span>
                        </li>

                        <li><hr class="dropdown-divider"></li>
                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a id="sign-out-link" class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                        <form id="logout-form" action="/logout" method="POST" class="d-none">
                            @csrf
                            <button type="submit">Log Out</button>
                        </form>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin') ? '' : 'collapsed' }}" href="/admin">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link {{ Str::startsWith(request()->path(), 'admin/posts') ? '' : 'collapsed' }}" href="{{ route('admin.posts.index') }}">
                    <i class="bi bi-file-text"></i>
                    <span>Posts</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Str::startsWith(request()->path(), 'admin/categories') ? '' : 'collapsed' }}" href="{{ route('admin.categories.index') }}">
                    <i class="bi bi-list-stars"></i>
                    <span>Categories</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Str::startsWith(request()->path(), 'admin/tags') ? '' : 'collapsed' }}" href="{{ route('admin.tags.index') }}">
                    <i class="bi bi-tags"></i>
                    <span>Tags</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Str::startsWith(request()->path(), 'admin/banners') ? '' : 'collapsed' }}" href="{{ route('admin.banners.index') }}">
                    <i class="bi bi-megaphone"></i>
                    <span>Banner ads</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Str::startsWith(request()->path(), 'admin/contacts') ? '' : 'collapsed' }}" href="{{ route('admin.contacts.index') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Contacts</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Str::startsWith(request()->path(), 'admin/generals') ? '' : 'collapsed' }}" href="{{ route('admin.generals.index') }}">
                    <i class="bi bi-people"></i>
                    <span>Generals</span>
                </a>
            </li><!-- End Error 404 Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Str::startsWith(request()->path(), 'admin/newsletter') ? '' : 'collapsed' }}" href="{{ route('admin.newsletter.index') }}">
                    <i class="bi bi-mailbox"></i>
                    <span>Newsletter</span>
                </a>
            </li><!-- End Blank Page Nav -->

        </ul>
    </aside><!-- End Sidebar-->

    {{ $slot }}

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed bottom-0 start-50 translate-middle-x" role="alert" id="flash-message">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer"> <div class="copyright"><strong><span>Digital Magazine</span></strong></div></footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/backend/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/backend/vendor/chart.js/chart.umd.js"></script>
    <script src="/backend/vendor/echarts/echarts.min.js"></script>
    <script src="/backend/vendor/quill/quill.min.js"></script>
    <script src="/backend/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/backend/vendor/tinymce/tinymce.min.js"></script>
    <script src="/backend/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/backend/js/main.js"></script>

    <!-- CKEditor -->
    <script src="/assets/vendor/ckeditor5/ckeditor.js"></script>

    <script src="/assets/vendor/jquery/dist/jquery.js"></script>

    <script src="/js/main.js"></script>
</body>

</html>
