<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'costPrice',
        'sellingPrice',
        'stock',
        'description',
        'supplier_id',
    ];

    public function getCostPriceAttribute($value)
    {
        return $value / 100;
    }

    public function getSellingPriceAttribute($value)
    {
        return $value / 100;
    }

    public function setCostPriceAttribute($value)
    {
        $this->attributes['costPrice'] = $value * 100;
    }

    public function setSellingPriceAttribute($value)
    {
        $this->attributes['sellingPrice'] = $value * 100;
    }

    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
