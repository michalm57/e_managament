<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    /**
     * @var string
     */
    protected $table = 'project_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id',
        'user_id',
    ];
}
