<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'user_id', 'description', 'responsible','deadline','completed'
    ];

    public static function scopeIncomplete()
    {
        return static::where('completed',0)->get();
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function addComment($body)
    {
        $this->comments()->create(compact('body'));

        // This is the classic version. But since we said the task has many commnets we could do the other way
        // Comment::Create([
        //     'body'=>$body,
        //     'task_id'=>$this->id
        // ]);
    }
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')->
        groupBy('year','month')->
        orderByRaw('min(created_at) desc')->
        get()
        ->toArray();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
