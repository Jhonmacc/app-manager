<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\DTOs\ProductDTO;
use App\Enums\ProductStatus;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $dto = new ProductDTO(
            name: $data['name'],
            description: $data['description'],
            price: (float) $data['price'],
            status: ProductStatus::from($data['status']),
        );

        return [
            'name' => $dto->name,
            'description' => $dto->description,
            'price' => $dto->price,
            'status' => $dto->status->value,
        ];
    }
}
