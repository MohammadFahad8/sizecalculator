<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tags extends Model
{
    use HasFactory;
    protected $fillable=['tagname','status','shop'];

    public function tagProducts()
    {
       return $this->hasMany(Products::class,'tag_id','id');
    }
    public function attributetypes(): HasMany
    {
        return $this->hasMany(Attributetypes::class, 'tag_id', 'id');
    }
    public function tagUser()
    {
        return $this->belongsTo(User::class, 'shop', 'id');
    }
}
