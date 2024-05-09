@props(["name"])

<div
    x-cloak
    x-data="{show: false}"
    x-show="show"
    @hashchange.window="
        show = (location.hash == '#{{ $name }}');
    "
>
    <div class="fixed bg-gray-900 inset-0 opacity-90"></div>

    <div  @click.away="show = false" class="bg-white shadow-md p-4 max-w-sm h-48 m-auto rounded md fixed inset-0">
        <div class="flex flex-col h-full justify-between">
            <header>
                <h3 class=font-bold text-lg">
                    {{ $title }}
                </h3>
            </header>

            <main class="mb-4">
                {{ $slot }}
            </main>

            <footer>
                {{ $footer }}
            </footer>
        </div>
    </div>

</div>