<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'websites';

    public static $searchable = [
        'web_url',
    ];

    protected $hidden = [
        'admin_password',
    ];

    protected $dates = [
        'date_uploaded',
        'date_last_check',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'web_url',
        'office_id',
        'status',
        'date_uploaded',
        'hosting_server_id',
        'config_file_location',
        'database_server_id',
        'platform_id',
        'web_version',
        'admin_url',
        'admin_password',
        'site_template',
        'favicon',
        'remarks',
        'date_last_check',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function getDateUploadedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateUploadedAttribute($value)
    {
        $this->attributes['date_uploaded'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function hosting_server()
    {
        return $this->belongsTo(WebServer::class, 'hosting_server_id');
    }

    public function database_server()
    {
        return $this->belongsTo(DatabaseServer::class, 'database_server_id');
    }

    public function platform()
    {
        return $this->belongsTo(TechnologyUsed::class, 'platform_id');
    }

    public function getDateLastCheckAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateLastCheckAttribute($value)
    {
        $this->attributes['date_last_check'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
