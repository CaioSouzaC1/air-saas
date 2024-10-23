<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scheduling extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'client_id',
        'service_id',
        'user_id',
        'date',

    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
