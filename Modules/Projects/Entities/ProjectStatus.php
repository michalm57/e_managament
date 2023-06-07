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

    /**
     * Get statuses id's.
     *
     * @return array
     */
    public static function getStatusesIds(): array
    {
        return array_column(self::all()->toArray(), 'id');
    }

    /**
     * Get status id by passed ProjectStatusEnum $status.
     *
     * @param ProjectStatusEnum $status
     * @return int
     */
    public static function getStatusId($status): int
    {
        return self::where('name', $status)->value('id');
    }
}
