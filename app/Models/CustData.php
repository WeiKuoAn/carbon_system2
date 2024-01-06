<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustData extends Model
{
    use HasFactory;
    protected $table = "cust_data";
    protected $fillable = ['user_id','introduce','capital','contact_name'
                          ,'contact_job','contact_email','contact_phone'
                          ,'registration_no','county','district','address'];
}
