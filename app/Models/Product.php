<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    use HasFactory;
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nm_product'
            ]
        ];
    }

    protected $guarded = ['id'];
    
    public function transaction_detail()
    {
        return $this->hasMany(TransactionDetail::class, 'product_id', 'id');
    }

}