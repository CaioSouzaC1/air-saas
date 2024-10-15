<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'user_id',
        'worker_id'
    ];

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
