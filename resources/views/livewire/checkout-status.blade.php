<div class="bg-white rounded p-5 mt-12 max-w-xl mx-auto">
    @if($this->order)
        Thank You for your order (#{{ $this->order->id }})
    @else
    <p wire:poll>
        Waiting for payment confirmation. Please standby ...
    </p>
    @endif
</div>
