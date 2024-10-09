<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cupon extends Model
{
    use HasFactory;
    protected $fillable = ['name','discount','valid-until'];
    /**
    convert the coupon name to upperCaser
    */
    public function setNameAttribute($value){
        $this->attributes['name'] = Str::upper($value);
    }
    public function checkIfValid(){
        if($this->valid_until > Carbon::now()){
            return true;
        }else{
            return false;
        }
    }
}
