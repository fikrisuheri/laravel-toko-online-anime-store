<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['thumbnails_path','price_rupiah'];

    public function Category()
    {
        return $this->belongsTo(Category::class,'categories_id');
    }

    public function getThumbnailsPathAttribute()
    {
        return asset('storage/' . $this->thumbnails);
    }

    public function getPriceRupiahAttribute()
    {
        return "Rp " . number_format($this->price,0,',','.');
	    
    }
}
