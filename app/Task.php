<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
//    protected $fillable = [ 'name', 'completed' ];

    public function file()
    {
        return $this->hasOne(File::class);
    }

    public function assignFile(File $file)
    {
        $file->task_id = $this->id;
        $file->save();
    }

    public function addTags($tags)
    {
        $this->tags()->saveMany($tags);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addTag($tag)
    {
        $this->tags()->saveMany($tag);
    }

    public function assignUser(User $user)
    {
        $this->user()->associate($user);

        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toogleCompleted(Task $task)
    {
        $task->completed= !$task->completed;
        $task->save();
    }
}