<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tags extends Model
{
    use HasFactory;
    protected $fillable=['tagname','status'];

    public function tagProducts()
    {
       return $this->hasMany(Products::class,'tag_id','id');
    }
    public function attributetypes(): HasMany
    {
        return $this->hasMany(Attributetypes::class, 'tag_id', 'id');
    }
}
