<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'stock',
        'status',
        'code',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getStatusChangeAttribute () {
        return $this->status ? 'Disponible' : 'No Disponible';
    }

    public function getStockChangeAttribute () {
        return number_format($this->stock, 2);
    }

    public function getCategoryNameAttribute () {
        return $this->category ? $this->category->name : '';
    }

    public function setCodeAttribute ($value) {
        $this->attributes['code'] = str_pad($value, 6, "0", STR_PAD_LEFT);
    }

    public function scopeFilterCode ($query, $value)
    {
        if ($value)
            return $query->where('code', 'like', '%'.$value.'%');
    }

    public function scopeFilterGraterStock ($query, $value)
    {
        if ($value)
            return $query->where('stock', '>=', $value);
    }

    public function scopeFilterCategory ($query, $value)
    {
        if ($value)
        {
            return $query->whereHas('category', function (Builder $query) use ($value) {
                $query->where('name', 'like', '%'.$value.'%');
            });
        }
    }

}
