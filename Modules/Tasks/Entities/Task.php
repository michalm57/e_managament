<?php

namespace Modules\Tasks\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'estimation',
        'spend_time',
        'priority_id',
        'type_id',
        'status_id',
    ];

    /**
     * Getting random task id.
     *
     * @return int
     */
    public static function getRandomId()
    {
        return self::inRandomOrder()->value('id');
    }
}