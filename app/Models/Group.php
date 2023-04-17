<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'description',
        'created_by'
    ];

    /**
     * Get the user associated with the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function members()
    {
        return $this->hasMany(GroupMember::class, 'group_id');
    }
}
