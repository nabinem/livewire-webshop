@props(['title' => false])
<div {{ $attributes->class(['bg-white p-4 rounded-lg shadow space-y-2']) }}>

    @if($title)
    <h1 class="font-medium text-lg">{{ $title }}</h1>
    @endif

    {{ $slot }}
</div>