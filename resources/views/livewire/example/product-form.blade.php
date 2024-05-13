<div class="p-6">
    <form wire:submit.prevent="save">
        <div>
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" wire:model="form.name" class="block mt-1 w-full" type="text" />
            @error('form.name')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>

        <div class="mt-4">
            <x-label for="price" value="{{ __('Price') }}" />
            <x-input id="price" wire:model="form.price" class="block mt-1 w-full" type="text" />
            @error('form.price')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>
        
        <div class="mt-4">
            <x-label for="description" value="Description" />
            <textarea wire:model="form.description" id="description" class="mt-1 w-full rounded-md border-gray-300"></textarea>
            @error('form.description')<div class="text-red-500">{{ $message }}</div>@enderror
        </div>

        <div class="mt-4">
            <x-button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50">
                Save
            </x-button>
        </div>

    </form>
</div>