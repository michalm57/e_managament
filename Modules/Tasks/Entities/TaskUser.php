<?php

namespace Modules\Tasks\Entities;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    /**
     * @var string
     */
    protected $table = 'task_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'task_id',
        'user_id',
    ];
}
