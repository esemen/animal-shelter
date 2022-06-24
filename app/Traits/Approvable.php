<?php

namespace App\Traits;

trait Approvable
{
    protected $approvalField = 'approved_at';

    public function isApproved():bool {
        return $this->getAttribute($this->approvalField) <> null;
    }

    public function clearApproval() {
        return $this->setAttribute($this->approvalField, null);
    }

    public function approve() {
        return $this->setAttribute($this->approvalField, now());
    }

    public function scopePending($query) {
        return $query->whereNull($this->approvalField);
    }

    public function scopeApproved($query) {
        return $query->whereNotNull($this->approvalField);
    }
}
