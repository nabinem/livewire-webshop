<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-hidden overflow-x-auto bg-white border-b border-gray-200">
 
                    <div class="min-w-full align-middle">
                        <div class="mb-4">
                            <a href="https://www.youtube.com/watch?v=wsupm82xrZw" class="text-blue-500 hover:underline" target="_blank">
                               SOURCE:  LaravelDaily https://www.youtube.com/watch?v=wsupm82xrZw
                            </a>
                        </div>
                        <div class="mb-2">
                            <x-button wire:click="$dispatch('openModal', { component: 'example.product-modal' })">
                                Add Product
                            </x-button>
                        </div>
                        <table class="min-w-full border divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Name</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Price</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Description</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                </th>
                            </tr>
                            </thead>
 
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @forelse($products as $product)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $product->price }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $product->description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            <x-button wire:click="$dispatch('openModal', { 
                                                component: 'example.product-modal',
                                                arguments: { product: {{ $product->id }}} 
                                            })">
                                                Edit
                                            </x-button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white">
                                        <td colspan="3" class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            No products found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</div>
