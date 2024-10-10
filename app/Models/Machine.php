<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{
    /** @use HasFactory<\Database\Factories\MachineFactory> */
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'user_id',
        'name',
        'model',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
