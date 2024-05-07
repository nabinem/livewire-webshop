<div class="grid grid-cols-4 gap-4 mt-12">
    @foreach($this->products as $product)
    <x-panel class="relative">
        <a href="{{ route('product', $product) }}" class="absolute inset-0 w-full h-full"></a>
        <img src="{{ $product->image->path }}" />
        <h2 class="font-medium text-lg">{{ $product->name }}</h2>
        <span class="text-gray-700 text-sm">{{ $product->price }}
    </x-panel >
    @endforeach
</div>
