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

class Fosterer extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable, UsesUuid, HasJsonOptions, Approvable;

    protected string $jsonOptions = 'mtar.fosterer_form.options';

    protected $fillable = [
        'reason',
        'applied_before',
        'fostering',
        'property',
        'garden',
        'occupants',
        'occupation',
        'experience',
        'care',
        'plans',
        'additional_info',
        'found_through',
        'uploads'
    ];

    protected $casts = [
        'fostering' => 'array',
        'property' => 'array',
        'garden' => 'array',
        'occupants' => 'array',
        'occupation' => 'array',
        'experience' => 'array',
        'care' => 'array',
        'plans' => 'array',
        'uploads' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function animal()
    {
        return $this->hasOne(Animal::class);
    }

    public function assessment()
    {
        return $this->hasMany(Assessment::class);
    }
}
