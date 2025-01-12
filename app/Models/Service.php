<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'price',
        'worker_id',
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function schedulings()
    {
        return $this->hasMany(Scheduling::class);
    }
}
