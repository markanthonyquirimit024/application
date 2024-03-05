<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['customer_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'customer_id');    
    }

    use HasFactory;
}
