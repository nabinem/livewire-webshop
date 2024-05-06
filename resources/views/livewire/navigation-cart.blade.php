<x-nav-link href="{{ route('cart') }}" :active="$this->isActive">
    {{ __('Your cart') }} ({{ $this->count }})
</x-nav-link>