<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = ['title', 'slug', 'content', 'preview', 'page_order'];

    public function pageType(): BelongsTo
    {
        return $this->belongsTo(PageType::class);
    }

    public function scopeRoutable($query) {
        return $query->whereHas('pageType', function($query){
            $query->where('routable', true);
        });
    }
}
