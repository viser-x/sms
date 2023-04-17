<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'contact_name',
        'contact_number'
    ];

    /**
     * Get the user associated with the GroupMember
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }
}
