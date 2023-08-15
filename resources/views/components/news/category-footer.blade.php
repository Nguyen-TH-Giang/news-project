<h4 class="font-weight-bold mb-4">Categories</h4>
<div class="d-flex flex-wrap m-n1">
    @foreach ($categories as $category)
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary m-1">{{ $category->name }}</a>
    @endforeach
</div>
