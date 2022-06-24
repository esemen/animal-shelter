<?php

namespace App\Models;

use App\Traits\HasJsonOptions;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Assessment extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable, UsesUuid, HasJsonOptions;

    protected string $jsonOptions = 'mtar.assessment_form.options';

    protected $fillable = [
        'dog'
    ];

    protected $casts = [
        'dog' => 'array',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
