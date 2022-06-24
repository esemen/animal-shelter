<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Animal extends Model implements AuditableContract
{
    //use Searchable;
    use HasFactory, Auditable, SoftDeletes, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "sex",
        "breed",
        "dob",
        "passport",
        "colour",
        "markings",
        "description",
        "short_description",
        "medical_note",
        "other_note",
        "weight",
        "microchip1",
        "microchip2",
        "update_chip",
        "chip_company",
        "incoming",
        "wormed",
        "fleaed",
        "kennel_cough",
        "neutered",
        "neuter_due",
        "first_jab",
        "second_jab",
        "first_rabies",
        "second_rabies",
        "booster_due",
        "stitches_out",
        "booking_info",
        "attributes",
        "located_date",
        "assessment_date",
        "assessment_note",
        "legacy_id",
    ];

    protected $auditExclude = [
        'assessment_note',
        'medical_note',
        'other_note',
        'description',
    ];

    /**
     * Default values
     *
     * @var array
     */
    protected $attributes = [
        'animal_status_id' => 1
    ];

    protected $appends = ['slug'];

    protected $hidden = [];

    protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'images' => 'array',
        'attributes' => 'array',
        'weight' => 'decimal:2',
        'locked_at' => 'date:Y-m-d',
        'dob' => 'date:Y-m-d',
        'update_chip' => 'boolean',
        'incoming' => 'date:Y-m-d',
        'wormed' => 'date:Y-m-d',
        'fleaed' => 'date:Y-m-d',
        'kennel_cough' => 'date:Y-m-d',
        'neutered' => 'date:Y-m-d',
        'neuter_due' => 'date:Y-m-d',
        'first_jab' => 'date:Y-m-d',
        'second_jab' => 'date:Y-m-d',
        'booster_due' => 'date:Y-m-d',
        'first_rabies' => 'date:Y-m-d',
        'second_rabies' => 'date:Y-m-d',
        'stitches_out' => 'date:Y-m-d',
        'status_change' => 'datetime',
        'dom_date' => 'date:Y-m-d',
        'dom_update' => 'datetime',
        'located_date' => 'date:Y-m-d',
        'available_date' => 'date:Y-m-d',
        'assessment_date' => 'date:Y-m-d'
    ];
    /**
     * @var mixed
     */

    public function location()
    {
        return $this->belongsTo(User::class, "location_id");
//        return $this->belongsTo(User::class, "location_email");
    }

    public function type() {
        return $this->belongsTo(AnimalType::class, "animal_type_id");
    }

    public function status() {
        return $this->belongsTo(AnimalStatus::class, "animal_status_id");
    }

    public function applications() {
        return $this->hasMany(Application::class);
    }

    public function assessments() {
        return $this->hasMany(Assessment::class, 'animal_id');
    }

    public function fosterer()
    {
        return $this->belongsTo(Fosterer::class);
    }

    public function getAgeAttribute() {
        return (! $this->attributes['dob']) ? null : $this->dob->age;
    }

    public function getAgeTextAttribute() {
        return (! isset($this->attributes['dob'])) ? null : $this->dob->longAbsoluteDiffForHumans();
    }

    public function getIncomingDateAttribute($dob) {
        return(! $this->attributes['incoming']) ? null : $this->incoming;
    }

    public function getSlugAttribute() {
        return Str::slug($this->attributes['name'] ?? null);
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('year_of_birth', 'like', '%'.$query.'%')
                ->orWhere('name', 'like', '%'.$query.'%')
                ->orWhere('animal_status_id', 'like', '%'.$query.'%')
                ->orWhere('breed', 'like', '%'.$query.'%')
                ->orWhere('sex', 'like', '%'.$query.'%');
    }

}
