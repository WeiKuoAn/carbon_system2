<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustProject extends Model
{
    use HasFactory;
    protected $table = "cust_project";
    protected $fillable = ['user_id','year','type','status'];

    public function user_data()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function cust_data()
    {
        return $this->hasOne('App\Models\CustData', 'user_id', 'user_id');
    }

    public function personnel_datas()
    {
        return $this->hasMany('App\Models\ProjectPersonnel', 'project_id', 'id');
    }

    public function drive_datas()
    {
        return $this->hasMany('App\Models\BusinessDrive', 'project_id', 'id');
    }

    public function situation_datas()
    {
        return $this->hasMany('App\Models\BusinessSituation', 'project_id', 'id');
    }

    public function need_datas()
    {
        return $this->hasMany('App\Models\BusinessNeed', 'project_id', 'id');
    }

    public function manufacture_need_data()
    {
        return $this->hasone('App\Models\ManufactureNeed', 'project_id', 'id');
    }

    public function manufacture_expected_datas()
    {
        return $this->hasMany('App\Models\ManufactureExpected', 'project_id', 'id');
    }

    public function manufacture_improve_datas()
    {
        return $this->hasMany('App\Models\ManufactureImprove', 'project_id', 'id');
    }

    public function project_host()
    {
        return $this->hasOne('App\Models\ProjectHost', 'project_id', 'id');
    }
}
