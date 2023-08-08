@props(['route'])

<div class="text-center">
    <button type="submit" class="btn btn-primary">{{ $slot }}</button>
    <a class="btn btn-secondary" href="{{ $route }}">Cancel</a>
</div>
