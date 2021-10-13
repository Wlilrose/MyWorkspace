<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatabaseServer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'database_servers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'server_name',
        'server_ip',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function databaseServerWebsites()
    {
        return $this->hasMany(Website::class, 'database_server_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
