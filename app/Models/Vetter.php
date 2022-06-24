<?php

namespace App\Models;

use App\Traits\Approvable;
use App\Traits\HasJsonOptions;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Vetter extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable, UsesUuid, HasJsonOptions, Approvable;

    protected string $jsonOptions = 'mtar.vetter_form.options';

    protected $fillable = [
        'travel',
        'home_check',
        'transport',
        'own_dog',
        'other_rescues',
        'dogs_adopted',
        'additional_info',
        'confirmations'
    ];

    protected $casts = [
        'confirmations'  => 'array',
        'approved_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
