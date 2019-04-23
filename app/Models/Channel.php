<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Channel.
 *
 * @package App\Models
 */
class Channel extends Model
{
    protected $guarded = [];

    public function addUser($user)
    {
        $this->users()->save($user);
        return $this;
    }
    public function addMessage($message)
    {
        $message->channel_id = $this->id;
        $message->save();
        return $this;
    }
    /**
     * Get the messages for the channel.
     */
    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function lastMessage()
    {
        return $this->messages->sortBy('created_at')->first();
    }
}
