<div>
    <form wire:submit.prevent="save" method="POST">
        @csrf
        <div class="form-group">
            Customer name
            <input type="text" wire:model="customer_name" name="customer_name" class="form-control"
                   value="{{ old('customer_name') }}">
            @error('customer_name')
                <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            Customer email
            <input type="email" wire:model="customer_email" name="customer_email" class="form-control"
                   value="{{ old('customer_email') }}">
                   @error('customer_email')
                   <span class="help-block text-danger">{{ $message }}</span>
               @enderror
        </div>

        <div class="form-group">
            Customer Country
            <select wire:model.live="customer_country" class="form-control">
                <option value="">-- choose country --</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('customer_country')
                <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            Customer City

            <select wire:model="customer_city" class="form-control">
                @if (empty($cities))
                <option value="">-- choose country first --</option>
                @else
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('customer_city')
                <span class="help-block text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="card">
            <div class="card-header">
                Products
                <button type="button" class="btn btn-sm ml-2 btn-primary" wire:click="testRedirect">
                    testRedirect
                </button>
            </div>

            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderProducts as $index => $orderProduct)
                        <tr>
                            <td>
                                <select name="orderProducts[{{$index}}][product_id]"
                                        wire:model="orderProducts.{{$index}}.product_id"
                                        class="form-control"
                                    >
                                    <option value="">-- choose product --</option>
                                    @foreach ($allProducts as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }} ({{ $product->price }})
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number"
                                       name="orderProducts[{{$index}}][quantity]"
                                       class="form-control"
                                       wire:model="orderProducts.{{$index}}.quantity" />
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary"
                            wire:click.prevent="addProduct">+ Add Another Product</button>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div>
            <input class="btn btn-primary" type="submit" value="Save Order">
        </div>
    </form>
</div>