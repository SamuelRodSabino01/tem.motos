<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'service_id',
        'quantity',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    public function part()
    {
        return $this->belongsToMany(Part::class)->withPivot('quantity');;
    }
    
    public function service()
    {
        return $this->belongsToMany(Service::class)->withPivot('quantity');;
    }

    protected static function booted()
    {
        static::deleting(function ($order) {
            // Verifica se é soft delete (deleted_at preenchido)
            if (!$order->isForceDeleting()) {
                // Desativar os relacionamentos na tabela pivot
                $order->part()->update(['deleted_at' => now()]);
                $order->service()->update(['deleted_at' => now()]);
            }
        });
    }
    
}
