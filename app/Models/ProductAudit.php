<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductAudit extends Model
{
    protected $fillable = ['product_id', 'action', 'details', 'user_id'];

    protected $casts = [
        'details' => 'array',
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getDetailsAttribute($value)
    {
        return is_array($value) ? $value : json_decode($value, true) ?? [];
    }
}
