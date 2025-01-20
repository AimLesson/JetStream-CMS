<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_profile',
        'logo',
        'about',
        'phone',
        'address',
        'profile_bg',
        'profile_banner1',
        'profile_banner2',
    ];
}
