<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App
 *
 * @author René Kulik <info@renekulik.de>
 */
class Task extends Model
{
    const TABLE_NAME = 'tasks';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
    ];
}
