<?php

namespace App\Models;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
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

    public function generateQrCode()
    {
        $userId = $this->user_id;

        $url = route('fast-login', ['userId' => $userId, 'machineId' => $this->id]);

        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($url)
            ->size(300)
            ->margin(10)
            ->build();

        $base64 = base64_encode($result->getString());

        return "data:image/png;base64,{$base64}";
    }
}
