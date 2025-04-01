<?php

namespace App\DTOs;

use App\Enums\ProductStatus;

class ProductDTO
{
    public function __construct(
        public string $name,
        public ?string $description,
        public float $price,
        public ProductStatus $status,
    ) {}
}
