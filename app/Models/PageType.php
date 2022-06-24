<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PageType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'long_name', 'slug', 'prefix', 'routable', 'controller'];

    protected $casts = ['controller' => 'array'];

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
