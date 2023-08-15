<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            {{ $slot }}

            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Social Follow Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Follow Us</h3>
                    </div>
                    <div class="d-flex mb-3">
                        @if (!is_null($generals->fb_link))
                            <a href="{{ $generals->fb_link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none" style="background: #39569E;">
                                <small class="fab fa-facebook-f mr-2"></small><small>FACEBOOK</small>
                            </a>
                        @endif

                        @if (!is_null($generals->twitter_link))
                            <a href="{{ $generals->twitter_link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none" style="background: #52AAF4;">
                                <small class="fab fa-twitter mr-2"></small><small>TWITTER</small>
                            </a>
                        @endif
                    </div>

                    <div class="d-flex mb-3">
                        @if (!is_null($generals->linkedin_link))
                            <a href="{{ $generals->linkedin_link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none" style="background: #0185AE;">
                                <small class="fab fa-linkedin-in mr-2"></small><small>LINKEDIN</small>
                            </a>
                        @endif

                        @if (!is_null($generals->instagram_link))
                            <a href="{{ $generals->instagram_link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none" style="background: #C8359D;">
                                <small class="fab fa-instagram mr-2"></small><small>INSTAGRAM</small>
                            </a>
                        @endif
                    </div>

                    <div class="d-flex mb-3">
                        @if (!is_null($generals->youtube_link))
                            <a href="{{ $generals->youtube_link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none" style="background: #DC472E;">
                                <small class="fab fa-youtube mr-2"></small><small>YOUTUBE</small>
                            </a>
                        @endif

                        @if (!is_null($generals->vimeo_link))
                            <a href="{{ $generals->vimeo_link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none"
                                style="background: #1AB7EA;">
                                <small class="fab fa-vimeo-v mr-2"></small><small>VIMEO</small>
                            </a>
                        @endif
                    </div>
                </div>
                <!-- Social Follow End -->

                <!-- Newsletter Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Newsletter</h3>
                    </div>
                    <div class="bg-light text-center p-4 mb-3">
                        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                        <small>Sit eirmod nonumy kasd eirmod</small>
                    </div>
                </div>
                <!-- Newsletter End -->

                <!-- Ads Start -->
                <x-news.side-banner />
                <!-- Ads End -->

                <!-- Popular News Start -->
                @if ($posts->count() > 0)
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Trending</h3>
                        </div>
                        @foreach ($posts as $post)
                            @if ($loop->iteration <= 4)
                                <x-news.small-news-item :post="$post"/>
                            @endif
                        @endforeach
                    </div>
                @endif
                <!-- Popular News End -->

                <!-- Tags Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tags</h3>
                    </div>
                    <x-news.tags />
                </div>
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- News With Sidebar End -->
