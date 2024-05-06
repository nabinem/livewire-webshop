<div class="grid grid-cols-2 gap-10 py-12">
    <div class="space-y-4" x-data="{image: '{{ asset($this->product->image->path) }}'}">
        <div class="bg-white p-5 rounded-lg shadow">
            <img :src="image" class="w-full">
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach($this->product->images as $image)
            <div class="rounded bg-white p-2 shadow">
                <img @click=" image = '{{ asset($image->path) }}' " src="{{ asset($image->path) }}" class="rounded w-full"/>
            </div>
            @endforeach
        </div>
    </div>
    <div class="">
        <h1 class="text-3xl font-medium"> {{ $this->product->name }}</h1>
        <div class="text-xl text-gray-700">{{ $this->product->price }}</div>
        
        <div class="mt-4">
            {{ $this->product->description }}
        </div>

        <div class="mt-4 space-y-4">
            <select name="" class="w-full rounded-md border-0 py-1.5 text-gray-800">
                @foreach($this->product->variants as $variant)
                <option value="{{ $variant->id }}">
                    {{ $variant->size }} / {{ $variant->color }}
                </option>
                @endforeach
            </select>

            <x-button>Add To Cart</x-button>

        </div>

    </div>
</div>