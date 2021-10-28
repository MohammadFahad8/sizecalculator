<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
    'product_id',
    'tag_id',
    'tags',
    'name',
    'status',
    'image_link',
    'website_name',
];

/**
 * Get all of the comments for the Products
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function variants(): HasMany
{
    return $this->hasMany(Variants::class, 'product_id', 'product_id');
}

/**
 * Get all of the comments for the Products
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function attributetypes(): HasMany
{
    return $this->hasMany(Attributetypes::class, 'product_id', 'product_id');
}

/**
 * Get all of the comments for the Products
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function sizeChart(): HasMany
{
    return $this->hasMany(Sizechart::class, 'product_id', 'product_id');
}


}

