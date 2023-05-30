<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Projects\Enums\ProjectStatusEnum;

class ProjectStatus extends Model
{
    /**
     * @var string
     */
    protected $table = 'project_statuses';

    /**
     * Get the values of the ProjectStatusEnum.
     *
     * @return array
     */
    public static function getEnumValues(): array
    {
        return array_column(ProjectStatusEnum::cases(), 'value');
    }

    /**
     * Get the names of the ProjectStatusEnum.
     *
     * @return array
     */
    public static function getEnumNames(): array
    {
        return array_column(ProjectStatusEnum::cases(), 'name');
    }
}
