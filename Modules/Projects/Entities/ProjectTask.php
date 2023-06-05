<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    /**
     * @var string
     */
    protected $table = 'project_tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id',
        'task_id',
    ];
}
