<?php

namespace App\Models;

use App\Models\Traits\ApiURI;
use App\Models\Traits\FormattedDates;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatMessage.
 *
 * @package App\Models
 */
class ChatMessage extends Model
{
    use FormattedDates, ApiURI;

    protected $guarded = [];

    /**
     * Get the channel that owns the chat message.
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function map()
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'api_uri' => $this->api_uri,
            'created_at' => $this->created_at,
            'created_at_timestamp' => $this->created_at_timestamp,
            'formatted_created_at' => $this->formatted_created_at,
            'formatted_created_at_diff' => $this->formatted_created_at_diff,
            'updated_at' => $this->updated_at,
            'updated_at_timestamp' => $this->updated_at_timestamp,
            'formatted_updated_at' => $this->formatted_updated_at,
            'formatted_updated_at_diff' => $this->formatted_updated_at_diff,
        ];
    }
}
