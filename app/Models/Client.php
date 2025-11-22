<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'address',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
