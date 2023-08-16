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
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </section>
    </div>

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

    <script src="/js/main.js"></script>
</body>
</html>
