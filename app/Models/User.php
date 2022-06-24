<?php

namespace App\Models;

use App\Traits\Approvable;
use App\Traits\UsesUuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, AuditableContract
{
    use HasFactory, Notifiable, UsesUuid, SoftDeletes, Auditable, Approvable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'house_no',
        'full_address',
        'address1',
        'address2',
        'address3',
        'town',
        'county',
        'latitude',
        'longitude',
        'postcode',
        'landline',
        'mobile',
        'email',
        'password',
    ];

    protected $auditInclude = [
        'title',
        'first_name',
        'last_name',
        'house_no',
        'full_address',
        'address1',
        'address2',
        'address3',
        'town',
        'county',
        'postcode',
        'landline',
        'mobile',
        'email',
        'approved_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'approved_at' => 'datetime'
    ];

    protected $appends = ['name', 'fullName', 'fullAddress'];

    /**
     * Relations
     */

    public function applications() {
        return $this->hasMany(Application::class);
    }

    public function animals() {
        return $this->hasMany(Animal::class, 'location_id');
//        return $this->hasMany(Animal::class, 'location_email');
    }

    public function fosterer()
    {
        return $this->hasOne(Fosterer::class);
    }

    public function vetter()
    {
        return $this->hasOne(Vetter::class);
    }

    public function homeChecks() {
        return $this->hasMany(HomeCheck::class);
    }

    public function assessment() {
        return $this->hasMany(Assessment::class);
    }

    /**
     * Mutators
     */

    public function getNameAttribute() {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getFullNameAttribute() {
        return $this->attributes['title'] . ' ' . $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getFullAddressAttribute() {
        return collect([
            $this->attributes['house_no'] ?? null,
            $this->attributes['address1'] ?? null,
            $this->attributes['address2'] ?? null,
            $this->attributes['address3'] ?? null,
            $this->attributes['postcode'] ?? null,
            $this->attributes['town'],
            $this->attributes['county']
            ])->whereNotNull()->implode(' ');
    }

    public function isSuperAdmin() {
        return $this->hasRole('Super Admin');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('search_key', 'like', '%'.$query.'%')
                ->orWhere('first_name', 'like', '%'.$query.'%')
                ->orWhere('first_name', 'like', '%'.$query.'%')
                ->orWhere('last_name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%');
    }
}
