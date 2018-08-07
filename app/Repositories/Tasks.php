<?php

namespace App\Repositories;

use App\Task;
use App\Redis;

class Tasks
{
    protected $redis;
    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function all()
    {
        /// return all tasks
        return Task::all();
    }
}