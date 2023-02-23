<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tambon extends Model
{
    use HasFactory;

    protected $table = 'tambons';

    protected $fillable = [
        'id',
        'tambon',
        'amphoe',
        'zipcode',
        'tambon_code',
        'amphoe_code',
        'province_code',
    ];
}
