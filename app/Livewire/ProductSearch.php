<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $search = '';

    public function render()
    {
        $products = Product::query()
            ->when($this->search, fn ($query) => $query->where('name', 'like', "%{$this->search}%"))
            ->get();

        return view('livewire.product-search', ['products' => $products]);
    }
}
