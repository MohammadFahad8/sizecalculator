<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributetypes extends Model
{
    use HasFactory;

    public function attribute()
    {
        return $this->hasOne(Attribute::class,'attribute_type','id');
    }
}
