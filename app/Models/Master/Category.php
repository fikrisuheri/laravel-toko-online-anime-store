<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','thumbnails','slug'];

    public function Products()
    {
        return $this->hasMany(Product::class,'categories_id','id');
    }
}
