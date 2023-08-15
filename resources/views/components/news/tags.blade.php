<div class="d-flex flex-wrap m-n1">
    @foreach ($tags as $tag)
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary m-1">{{ $tag->name }}</a>
    @endforeach
</div>
