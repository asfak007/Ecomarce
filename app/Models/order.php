<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['qty', 'total', 'delivered_at', 'user_id', 'coupon_id'];

    public function products()
    {
        return $this->belongsToMany(product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}