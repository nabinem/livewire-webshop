<x-panel class="mt-12 col-span-2 max-w-lg mx-auto" title="My Orders">
        <table class="w-full">
            <thead>
                <th class="text-left">Order</th>
                <th class="text-left">Ordered At</th>
                <th class="text-right">Total</th>
            </thead>
            <tbody>
                @foreach($this->orders as $order)
                <tr wire:key="{{ $order->id }}">
                    <td>
                        <a href="{{ route('view-order', $order->id) }}" class="underline font-medium">
                            #{{ $order->id }}
                        </a>
                    </td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td class="text-right">{{ $order->amount_total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-panel>