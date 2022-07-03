<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','thumbnails','slug'];
    protected $appends = ['thumbnails_path'];

    public function Products()
    {
        return $this->hasMany(Product::class,'categories_id','id');
    }

    public function getThumbnailsPathAttribute()
    {
        return asset('storage/'. $this->thumbnails);
    }

}
