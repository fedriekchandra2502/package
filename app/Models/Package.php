<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_name',
        'customer_name',
        'customer_address',
        'customer_email',
        'customer_phone',
        'receiver_name',
        'receiver_address',
        'receiver_phone',
    ];
}
