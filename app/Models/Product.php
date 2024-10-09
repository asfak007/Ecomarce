<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug' ,'price', 'qty', 'desc', 'thumbnail','first_image','second_image','third_image','status'];

    public function getThumbnailAttribute($value){
        $this->attributes['thumbnail'] = Str::upper($value);
    }
    public function colors($value)
    {
        return $this->belongsToMany(Color::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function orders(){
        return $this->belongsToMany(Cupon::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class)
            ->with('user')
            ->where('approved',1)->latest();
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}
