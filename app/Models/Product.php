<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'stock',
        'status',
        'code'
    ];

    public function getStatusChangeAttribute () {
        return $this->status ? 'Disponible' : 'No Disponible';
    }

    public function getStockChangeAttribute () {
        return number_format($this->stock, 2);
    }

    public function setCodeAttribute ($value) {
        $this->attributes['code'] = str_pad($value, 6, "0", STR_PAD_LEFT);
    }

}
