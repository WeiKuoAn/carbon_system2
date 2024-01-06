<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustProject extends Model
{
    use HasFactory;
    protected $table = 'cust_project';
    protected $fillable = [
        'user_id', 'year', 'type', 'last_year_revenue', 'insured_employees',
        'insurance_male', 'insurance_female', 'insurance_total' ,'production_chart', 'clients_market',
        'export_status', 'contact_name', 'contact_email', 'contact_phone',
        'nas_link', 'carbon_done', 'status'
    ];

    public function user_data()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function cust_data()
    {
        return $this->hasOne('App\Models\CustData', 'user_id', 'user_id');
    }

    public function socail_datas()
    {
        return $this->hasMany('App\Models\CustSocail', 'project_id', 'id');
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

    public function manufacture_need_datas()
    {
        return $this->hasMany('App\Models\ManufactureNeed', 'project_id', 'id');
    }

    public function manufacture_expected_datas()
    {
        return $this->hasMany('App\Models\ManufactureExpected', 'project_id', 'id');
    }

    public function manufacture_improve_datas()
    {
        return $this->hasMany('App\Models\ManufactureImprove', 'project_id', 'id');
    }

    public function manufacture_norm_datas()
    {
        return $this->hasMany('App\Models\ManufactureNorm', 'project_id', 'id');
    }
}
