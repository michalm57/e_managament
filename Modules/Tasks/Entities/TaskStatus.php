<?php

namespace Modules\Tasks\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Tasks\Enums\TaskStatusEnum;

class TaskStatus extends Model
{
    /**
     * @var string
     */
    protected $table = 'task_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the values of the TaskStatusEnum.
     *
     * @return array
     */
    public static function getEnumValues(): array
    {
        return array_column(TaskStatusEnum::cases(), 'value');
    }

    /**
     * Get the names of the TaskStatusEnum.
     *
     * @return array
     */
    public static function getEnumNames(): array
    {
        return array_column(TaskStatusEnum::cases(), 'name');
    }
}
