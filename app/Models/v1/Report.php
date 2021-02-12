<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';

    public function site_schedule()
    {
    	return $this->belongsTo('App\Models\v1\SiteSchedule', 'id_site_schedule', 'id');
    }

    public function security()
    {
    	return $this->belongsTo('App\Models\v1\Security', 'id_security_real', 'id');
    }

    public function report_detail()
    {
    	return $this->hasMany('App\Models\v1\ReportDetail', 'id_report', 'id');
    }
}
