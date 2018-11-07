<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function map()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'color' => $this->color,
//            'user_id' => $this->user_id,
//            'user_name' => optional($this->user)->name
//            'tags' => $this->tags,
//            'file' => $this->file,
        ];
    }
}
