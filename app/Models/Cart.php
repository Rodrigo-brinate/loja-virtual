<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegisterProduct;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $fillable = ['user_id', 'product_id'];

    public function product(){
    
        return $this->hasMany(RegisterProduct::class, 'id', 'product_id');
    }
}
