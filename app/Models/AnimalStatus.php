<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnimalStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'public'];

    public function animals() {
        return $this->hasMany(Animal::class);
    }

    public function scopePublic($query) {
        return $query->where('public', 1);
    }
}
