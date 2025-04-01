<div>
    <input wire:model.debounce.500ms="search" type="text" placeholder="Buscar produtos..." class="border p-2 rounded">
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - {{ $product->price }}</li>
        @endforeach
    </ul>
</div>
