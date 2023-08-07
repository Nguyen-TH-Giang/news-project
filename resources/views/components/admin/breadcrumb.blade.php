@props(['items'])

<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

        @foreach ($items as $key => $item)
            <li class="breadcrumb-item {{ $loop->last ? ' active' : '' }}">{{ $item['label'] }}</li>
        @endforeach
    </ol>
</nav>
