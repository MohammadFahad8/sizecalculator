<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sizechart extends Model
{
    use HasFactory;
    protected $fillable = ['height_start','height_end','weight_start','weight_end','product_id'];



    /**
     * Get all of the comments for the Sizechart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bodyFeature(): HasMany
    {
        return $this->hasMany(Bodyfeature::class, 'sizechart_id', 'id');
    }

    /**
     * Get the user that owns the Sizechart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }

        /**
         * Get the user that owns the Sizechart
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function attributecsb(): HasMany
        {
            return $this->hasMany(Attributeimages::class, 'tag_id', 'product_id');
        }

}
