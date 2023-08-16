<div class="navbar-nav mr-auto py-0">
    <a href="/" class="nav-item nav-link active">Home</a>
    <a href="/category" class="nav-item nav-link">Categories</a>

    @foreach ($categories as $category)
        @if ($loop->iteration <= 10)
            @if ($category->categories->isNotEmpty())
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $category->name }}</a>
                    <!-- Sub categories here -->
                    <div class="dropdown-menu rounded-0 m-0">
                        @foreach ($category->categories as $subcategory)
                            <a href="javascript:void(0)" class="dropdown-item">{{ $subcategory->name }}</a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="javascript:void(0)" class="nav-item nav-link">{{ $category->name }}</a>
            @endif
        @endif
    @endforeach
    <a href="/contact" class="nav-item nav-link">Contact</a>
</div>
