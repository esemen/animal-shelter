<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCheck extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = ['check_date', 'opinion', 'notes'];

    protected $casts = [
        'check_date' => 'date'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function application() {
        return $this->belongsTo(Application::class);
    }

    public function complete() {
        $this->attributes['completed'] = true;
        return $this;
    }

    public function scopePending($query) {
        $query->where('completed', false);
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


}


