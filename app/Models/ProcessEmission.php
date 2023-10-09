<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessEmission extends Model
{
    use HasFactory;
    protected $table = "process_emissions";
    protected $fillable = ['process_code','equipment_code','fuel_name'
                          ,'emission_data','activity_data','unit','ghg_type'
                          ,'single_source_emission_total','single_source_percentage'];
}
