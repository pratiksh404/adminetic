<?php

namespace Pratiksh\Adminetic\Traits;

use Pratiksh\Adminetic\Models\Admin\Preference;

trait HasPreference
{
    /**
     * The preferences that belong to the User.
     */
    public function preferences()
    {
        return $this->belongsToMany(Preference::class)->withPivot('enabled')->withTimestamps();
    }
}
