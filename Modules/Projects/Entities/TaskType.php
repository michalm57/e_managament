<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    /**
     * @var string
     */
    protected $table = 'task_type';

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
        return array_column(TaskTypeEnum::cases(), 'value');
    }

    /**
     * Get the names of the ProjectStatusEnum.
     *
     * @return array
     */
    public static function getEnumNames(): array
    {
        return array_column(TaskTypeEnum::cases(), 'name');
    }
}
