<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEWSROOM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0&appId=1263984424255702&autoLogAppEvents=1" nonce="QHVTfeQY"></script>

    @php
        $path = public_path('/storage/' . $generals->logo);
        $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $generals->logo) : '/news/img/favicon.ico';
    @endphp
    <!-- Favicon -->
    <link href="{{ $imageSrc }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/news/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/news/css/style.css" rel="stylesheet">
    <link href="/news/css/customizedStyle.css" rel="stylesheet">

</head>

<body>
    <!-- Topbar Start -->
    <x-news.trending />
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('news._navbar')
    <!-- Navbar End -->

    {{ $slot }}

    {{-- Flash message --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show fixed-bottom w-25 mx-auto text-center" role="alert" id="flash-message">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>
    @endif

    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="/" class="navbar-brand">
                    <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
                <p>{!! $generals->description !!}</p>

                <div class="d-flex justify-content-start mt-4">
                    @if (!is_null($generals->twitter_link))
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $generals->twitter_link }}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if (!is_null($generals->fb_link))
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $generals->fb_link }}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if (!is_null($generals->linkedin_link))
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $generals->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if (!is_null($generals->instagram_link))
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $generals->instagram_link }}"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if (!is_null($generals->youtube_link))
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $generals->youtube_link }}"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if (!is_null($generals->vimeo_link))
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $generals->vimeo_link }}"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-5"><x-news.category-footer /></div>

            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Tags</h4>
                <x-news.tags />
            </div>

            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">General Information</h4>
                <p>Email: {{ $generals->email }}</p>
                <p>Phone: {{ $generals->phone }}</p>
                <p>Address: {{ $generals->address }}</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">&copy; <a class="font-weight-bold" href="/">E Magazine</a>

			<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
			Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/news/lib/easing/easing.min.js"></script>
    <script src="/news/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" integrity="sha512-/bOVV1DV1AQXcypckRwsR9ThoCj7FqTV2/0Bm79bL3YSyLkVideFLE3MIZkq1u5t28ke1c0n31WYCOrO01dsUg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Contact Javascript File -->
    <script src="/news/mail/jqBootstrapValidation.min.js"></script>
    <script src="/news/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/news/js/main.js"></script>
</body>

</html>
