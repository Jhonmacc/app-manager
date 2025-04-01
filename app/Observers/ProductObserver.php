<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductAudit;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    public function created(Product $product): void
    {
        ProductAudit::create([
            'product_id' => $product->id,
            'action' => 'created',
            'details' => ['name' => $product->name],
            'user_id' => Auth::id(),
        ]);
    }

    public function updated(Product $product): void
    {
        if ($product->isDirty()) {
            $changes = ['name' => $product->name]; // Sempre incluir o nome
            foreach ($product->getDirty() as $key => $value) {
                $changes[$key] = [
                    'old' => $product->getOriginal($key),
                    'new' => $value,
                ];
            }

            ProductAudit::create([
                'product_id' => $product->id,
                'action' => 'updated',
                'details' => $changes,
                'user_id' => Auth::id(),
            ]);
        }
    }

    public function deleted(Product $product): void
    {
        ProductAudit::create([
            'product_id' => $product->id,
            'action' => 'deleted',
            'details' => ['name' => $product->name],
            'user_id' => Auth::id(),
        ]);
    }

    public function restored(Product $product): void
    {
        ProductAudit::create([
            'product_id' => $product->id,
            'action' => 'restored',
            'details' => ['name' => $product->name],
            'user_id' => Auth::id(),
        ]);
    }

    public function forceDeleted(Product $product): void
    {
        ProductAudit::create([
            'product_id' => $product->id,
            'action' => 'force_deleted',
            'details' => ['name' => $product->name],
            'user_id' => Auth::id(),
        ]);
    }
}
