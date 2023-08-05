<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'extension',
        'url',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
