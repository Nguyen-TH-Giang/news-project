<div class="d-flex flex-wrap m-n1">
    @foreach ($tags as $tag)
        <a href="/?tag={{ $tag->name }}" class="btn btn-sm btn-outline-secondary m-1">{{ $tag->name }}</a>
    @endforeach
</div>
