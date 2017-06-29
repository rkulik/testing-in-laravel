<?php

namespace App\Http\Controllers;

use App\Task;
use App\Transformers\TaskTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class ApiTaskController
 * @package App\Http\Controllers
 *
 * @author René Kulik <info@renekulik.de>
 */
class ApiTaskController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->buildCollectionResponse(
            Task::all(),
            new TaskTransformer(),
            Task::RESOURCE_KEY
        );
    }
}
