<?php

namespace App\Transformers;

use App\Task;
use League\Fractal\TransformerAbstract;

/**
 * Class TaskTransformer
 * @package App\Transformers
 *
 * @author René Kulik <info@renekulik.de>
 */
class TaskTransformer extends TransformerAbstract
{
    public function transform(Task $task): array
    {
        return [
            'id' => $task->id,
            'title' => $task->title,
        ];
    }
}
