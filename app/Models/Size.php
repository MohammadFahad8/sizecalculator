<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','alias','variant','attr_id'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'attr_id','id');
    }
}
