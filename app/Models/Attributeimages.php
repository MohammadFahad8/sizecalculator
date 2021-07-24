<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attributeimages extends Model
{
    use HasFactory;
    protected $fillable = ['attr_size_value','attr_image_src','attribute_size_name','attribute_type_id','product_id','created_at','updated_at'];


    /**
     * Get the user that owns the Attributeimages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attributeTypes(): BelongsTo
    {
        return $this->belongsTo(Attributetypes::class, 'attribute_type_id', 'id');
    }
}
