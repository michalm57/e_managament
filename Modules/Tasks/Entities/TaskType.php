<?php

namespace Modules\Tasks\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Tasks\Enums\TaskTypeEnum;

class TaskType extends Model
{
    /**
     * @var string
     */
    protected $table = 'task_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the values of the TaskTypeEnum.
     *
     * @return array
     */
    public static function getEnumValues(): array
    {
        return array_column(TaskTypeEnum::cases(), 'value');
    }

    /**
     * Get the names of the TaskTypeEnum.
     *
     * @return array
     */
    public static function getEnumNames(): array
    {
        return array_column(TaskTypeEnum::cases(), 'name');
    }
}
