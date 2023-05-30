<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name_product',
        'description',
        'price',
        'status',
        'created_by',
        'verified_by',
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id' , 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, ['created_by', 'verified_by'], 'id');
    }
}
