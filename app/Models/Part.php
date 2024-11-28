<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'costPrice',
        'sellingPrice',
        'stock',
        'description',
        'supplier_id',
    ];

    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
