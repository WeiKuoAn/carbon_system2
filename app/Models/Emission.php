<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emission extends Model
{
    use HasFactory;

    protected $table = "emission";

    protected $fillable = [
        'basic_inventory_id',
        'scope_id',
        'source_id',
        'iso16064_id',
        'ghg_id',
        'process_id',
        'device_id',
        'electricity_type',
        'electricity_source',
        'fuel',
        'text',
        'image',
        'status',
    ];
}
