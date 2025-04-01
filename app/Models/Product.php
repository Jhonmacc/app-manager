<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\ProductStatus;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'status'];

    protected $casts = [
        'status' => ProductStatus::class,
    ];

    #[Attribute]
    public function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => trim($value),
        );
    }

    #[Attribute]
    public function price(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => (float) $value,
        );
    }
}
