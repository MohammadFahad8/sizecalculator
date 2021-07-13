<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bodyfeature extends Model
{
    use HasFactory;

    protected $fillable = ['attr_name','attr_measurement_start','attr_measurement_end','chest','stomach','bottom','sizechart_id'];


    /**
     * Get the user that owns the Bodyfeature
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sizeChart(): BelongsTo
    {
        return $this->belongsTo(Sizechart::class, 'sizechart_id', 'id');
    }

    /**
     * Get the user that owns the Bodyfeature
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attributeTypeParent(): BelongsTo
    {
        return $this->belongsTo(Attributetypes::class, 'attr_id', 'id');
    }
}
