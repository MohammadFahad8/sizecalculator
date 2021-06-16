<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selectedsize extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','title','image_link','vendor','admin_graphql_api_id'];
}
