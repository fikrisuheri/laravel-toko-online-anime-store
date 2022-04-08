<?php

namespace App\Models\Feature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['status_name'];

    public function Customer()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function getStatusNameAttribute()
    {
        $status = [
            '0' => '<p class="badge badge-warning">Pending</p>',
            '1' => '<p class="badge badge-primary">Diproses</p>',
            '2' => '<p class="badge badge-info">Dikirim</p>',
            '3' => '<p class="badge badge-success">Selesai</p>',
            '4' => '<p class="badge badge-secondary">Dibatalkan</p>',
        ];
        return $status[$this->status];
    }
}
