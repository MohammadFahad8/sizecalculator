<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['attribute_name','attribute_type','is_required','status'];

    public function size()
    {
        return $this->hasOne(Size::class,'attr_id','id');
    }
    
    public function attributetype()
    {
        return $this->belongsTo(Attributetypes::class,'attribute_type','id');
    }
}
