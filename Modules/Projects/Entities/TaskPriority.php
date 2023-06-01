<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Projects\Enums\TaskPriorityEnum;

class TaskPriority extends Model
{
    /**
     * @var string
     */
    protected $table = 'task_priorities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the values of the ProjectStatusEnum.
     *
     * @return array
     */
    public static function getEnumValues(): array
    {
        return array_column(TaskPriorityEnum::cases(), 'value');
    }

    /**
     * Get the names of the ProjectStatusEnum.
     *
     * @return array
     */
    public static function getEnumNames(): array
    {
        return array_column(TaskPriorityEnum::cases(), 'name');
    }
}
