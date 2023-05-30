<?php

namespace Modules\Projects\Entities;

use App\Modules\Projects\Enums\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => ProjectStatusEnum::class
    ];

    /**
     * Get the status associated with the project.
     */
    public function status()
    {
        return $this->hasOne(ProjectStatus::class);
    }
}
