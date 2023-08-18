<div class="navbar-nav mr-auto py-0">
    <a href="/" class="nav-item nav-link {{ request()->is('/') ? ' active' : '' }}">Home</a>
    <a href="/category" class="nav-item nav-link {{ request()->is('category') ? ' active' : '' }}">Categories</a>

    @foreach ($categories as $category)
        @if ($loop->iteration <= 10)
            @if ($category->categories->isNotEmpty())
                <div class="nav-item dropdown">
                    <a id="categoryDropdown" href="/?category={{ $category->slug }}" class="nav-link dropdown-toggle {{ $category->is($currentCategory) ? ' active' : '' }}" data-toggle="dropdown">{{ $category->name }}</a>
                    <!-- Sub categories here -->
                    <div class="dropdown-menu rounded-0 m-0">
                        @foreach ($category->categories as $subcategory)
                            <a href="/?category={{ $subcategory->slug }}" class="dropdown-item {{ $subcategory->is($currentCategory) ? ' active' : '' }}">{{ $subcategory->name }}</a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="/?category={{ $category->slug }}" class="nav-item nav-link {{ $category->is($currentCategory) ? ' active' : '' }}">{{ $category->name }}</a>
            @endif
        @endif
    @endforeach
    <a href="/contact" class="nav-item nav-link {{ request()->is('contact') ? ' active' : '' }}">Contact</a>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const parentLink = document.querySelector(".dropdown-toggle");

        parentLink.addEventListener("click", function(event) {
            event.preventDefault();
            const targetUrl = this.getAttribute("href");
            window.location.href = targetUrl;
        });
    });
</script>
