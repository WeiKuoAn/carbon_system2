<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDrive extends Model
{
    use HasFactory;
    protected $table = 'business_drive';
    protected $fillable = [
        'user_id', 'project_id', 'name', 'numbers', 'principal', 'employeecount'
    ];
}