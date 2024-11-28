<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'service_id',
        'quantity',
        'price',
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
    
}
