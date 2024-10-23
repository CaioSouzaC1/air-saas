<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telephone',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['worker_id'];

    public function getWorkerIdAttribute()
    {
        if ($this->type === 'worker') {
            return $this->worker->id;
        }
        if ($this->type === 'operator') {
            return $this->operator->worker->id;
        }
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function username()
    {
        return 'telephone';
    }


    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function operator()
    {
        return $this->hasOne(Operator::class);
    }

    public function worker()
    {
        return $this->hasOne(Worker::class);
    }

    public function schedulings()
    {
        return $this->hasMany(Scheduling::class);
    }
}
