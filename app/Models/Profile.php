<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'company_profile',
        'logo',
        'about',
        'phone',
        'address',
        'visi',
        'misi',
        'background',
        'banner1',
        'banner2',
    ];
    
}
