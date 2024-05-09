<button {{ $attributes([
        'type' => 'button',
        "class" =>"text-xs uppercase py-2 px-4 transition-all rounded text-white duration-200 mr-2"
        ]) 
    }}>
    {{ $slot }}
</button>