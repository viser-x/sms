<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_member_id',
        'number',
        'message_id'
    ];

    /**
     * Get the user associated with the MessageInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function receivers()
    {
        return $this->hasOne(GroupMember::class, 'id', 'group_member_id');
    }
    /**
     * Get the message associated with the MessageInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function message()
    {
        return $this->hasOne(Message::class, 'id', 'message_id');
    }
}
