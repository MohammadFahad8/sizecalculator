<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attributetypes extends Model
{
    use HasFactory;
    protected $fillable = ['name','product_id','status'];

    public function attribute()
    {
        return $this->hasOne(Attribute::class,'attribute_type','id');
    }
    
    /**
     * Get the user that owns the Attributetypes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }


    /**
     * Get the user associated with the Attributetypes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bodyFeatureOfType(): HasOne
    {
        return $this->hasOne(Bodyfeature::class, 'attr_id', 'id');
    }

    /**
     * Get all of the comments for the Attributetypes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sizecharts(): HasMany
    {
        return $this->hasMany(Sizechart::class, 'product_id', 'product_id');
    }

    /**
     * Get all of the comments for the Attributetypes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attrDetails(): HasMany
    {
        return $this->hasMany(Attributeimages::class, 'attribute_type_id', 'id');
    } public function attrItems(): HasMany
    {
        return $this->hasMany(Attributeimages::class, 'attribute_type_id', 'id');
    }
}
