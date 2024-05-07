<x-nav-link wire:navigate href="{{ route('cart') }}" :active="$this->isActive">
    {{ __('Your cart') }} ({{ $this->count }})
</x-nav-link>