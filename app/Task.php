<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App
 *
 * @property int $id
 * @property string $title
 *
 * @author René Kulik <info@renekulik.de>
 */
class Task extends Model
{
    public const TABLE_NAME = 'tasks';
    public const RESOURCE_KEY = 'tasks';

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
