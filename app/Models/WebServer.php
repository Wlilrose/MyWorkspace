<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebServer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'web_servers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'server_name',
        'ip_address',
        'operating_system',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hostingServerWebsites()
    {
        return $this->hasMany(Website::class, 'hosting_server_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
