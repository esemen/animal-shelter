<?php

namespace App\Models;

use App\Traits\Approvable;
use App\Traits\HasJsonOptions;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;
use Illuminate\Notifications\Notifiable;

class Application extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable, UsesUuid, HasJsonOptions, Approvable;

    protected $fillable = [
        'reason',
        'applied_before',
        'property',
        'garden',
        'occupants',
        'occupation',
        'experience',
        'care',
        'plans',
        'additional_info',
        'found_through',
        'uploads',
        'legacy_id',
    ];

    protected $casts = [
        'property' => 'array',
        'garden' => 'array',
        'occupants' => 'array',
        'occupation' => 'array',
        'experience' => 'array',
        'care' => 'array',
        'plans' => 'array',
        'uploads' => 'array',
    ];

    protected string $jsonOptions = 'mtar.application_form.options';

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(ApplicationStatus::class, 'application_status_id');
    }

    public function homeCheck() {
        return $this->hasOne(HomeCheck::class);
    }

    public function scopePublished($query)
    {
        return $query->whereHas('status', function ($query) {
            $query->where('published', true);
        });
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('town', 'like', '%'.$query.'%')
                ->orWhere('county', 'like', '%'.$query.'%')
                ->orWhere('created_at', 'like', '%'.$query.'%')
                ->orWhere('property', 'like', '%'.$query.'%')
                ->orWhere('garden', 'like', '%'.$query.'%');
    }
}
