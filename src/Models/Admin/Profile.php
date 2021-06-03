<?php

namespace Pratiksh\Adminetic\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Attribute Casting
    protected $casts = [
        'phone_no' => 'array',
    ];

    // Accessors
    public function getStatusAttribute($attribute)
    {
        return isset($this->status) ? [
            1 => 'Active',
            2 => 'Inactive',
            3 => 'Blocked',
        ][$attribute] : null;
    }

    public function getBloodGroupAttribute($attribute)
    {
        return isset($this->blood_group) ? [
            1 => 'A',
            2 => 'B',
            3 => 'A+',
            4 => 'B+',
            5 => 'AB',
            6 => 'AB+',
            7 => 'O+',
            8 => 'O-',
        ][$attribute] : null;
    }

    public function getMartialStatusAttribute($attribute)
    {
        return isset($this->martial_status) ? [
            1 => 'Married',
            2 => 'Unmarried',
            3 => 'Divorced',
            4 => 'Widowed',
        ][$attribute] : null;
    }

    // Relation
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
