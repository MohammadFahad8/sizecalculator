<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bodyfeature extends Model
{
    use HasFactory;

    protected $fillable = ['chest','stomach','bottom','sizechart_id'];


    /**
     * Get the user that owns the Bodyfeature
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sizeChart(): BelongsTo
    {
        return $this->belongsTo(Sizechart::class, 'sizechart_id', 'id');
    }
}
