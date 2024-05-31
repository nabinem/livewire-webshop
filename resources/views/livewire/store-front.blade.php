<div class="mytest mt-12">
    <div class="flex justify-between">
        <h2 class="text-xl font-medium sm:mt-7 w-[20%]">Our Products</h2>
        <div>
            <x-input wire:model.live.debounce="keywords" type="search" placeholder="Search"/>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 mt-12">
        @foreach($this->products as $product)
        <x-panel class="relative">
            <a wire:navigate href="{{ route('product', $product) }}" class="absolute inset-0 w-full h-full"></a>
            <img src="{{ $product->image->path }}" />
            <h2 class="font-medium text-lg">{{ $product->name }}</h2>
            <span class="text-gray-700 text-sm">{{ $product->price }}
        </x-panel >
        @endforeach
    </div>
    <div class="mt-6">
        {{ $this->products->links() }}
    </div>
</div>
