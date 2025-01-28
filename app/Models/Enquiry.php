<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'message'
    ];


    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%")
        ->orWhere('description','like',"%{$value}%");
    }
}
