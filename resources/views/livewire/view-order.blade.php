<div class="grid grid-cols-2 gap-4">
    <x-panel class="mt-12 col-span-2" title="Your Order #{{ $this->order->id }}">
        <table class="w-full">
            <thead>
                <th class="text-left">Product</th>
                <th class="text-left">Price</th>
                <th class="text-left">Quantity</th>
                <th class="text-right">Total</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach($this->order->items as $item)
                <tr wire:key="{{ $item->id }}">
                    <td>
                        {{ $item->name }} <br>
                        {{ $item->description }}
                    </td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="text-right">{{ $item->amount_subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                @if($this->order->amount_shipping->isPositive())
                <tr>
                    <td colspan="5" class="text-right font-medium">Shipping</td>
                    <td class="font-medium text-right">{{ $this->order->amount_shipping }}</td>
                </tr>
                @endif
                @if($this->order->amount_discount->isPositive())
                <tr>
                    <td colspan="5" class="text-right font-medium">Discount</td>
                    <td class="font-medium text-right">{{ $this->order->amount_discount }}</td>
                </tr>
                @endif
                @if($this->order->amount_tax->isPositive())
                <tr>
                    <td colspan="5" class="text-right font-medium">Tax</td>
                    <td class="font-medium text-right">{{ $this->order->amount_tax }}</td>
                </tr>
                @endif
                <tr>
                    <td colspan="5" class="text-right font-medium">SubTotal</td>
                    <td class="font-medium text-right">{{ $this->order->amount_subtotal }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right font-medium">Total</td>
                    <td class="font-medium text-right">{{ $this->order->amount_total }}</td>
                </tr>

            </tfoot>
        </table>
    </x-panel>
    <x-panel title="Billing Address" class="col-span-1">
        @foreach($this->order->billing_address->filter() as $value)
        {{ $value }} <br>
        @endforeach
    </x-panel>
    <x-panel title="Shipping Address"  class="col-span-1">
        @foreach($this->order->shipping_address->filter() as $value)
        {{ $value }} <br>
        @endforeach
    </x-panel>
</div>