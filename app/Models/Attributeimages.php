<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attributeimages extends Model
{
    use HasFactory;
    protected $fillable = ['size_one','size_second','size_third','image_one','image_second','image_third','attribute_type_id','product_id','created_at','updated_at'];


    /**
     * Get the user that owns the Attributeimages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attributeTypes(): BelongsTo
    {
        return $this->belongsTo(Attributetypes::class, 'foreign_key', 'other_key');
    }
}
