<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\ResourceAbstract;
use League\Fractal\TransformerAbstract;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $item
     * @param TransformerAbstract $transformer
     * @param null|string $resourceKey
     * @param int $status
     * @param array $headers
     * @return JsonResponse
     */
    protected function buildItemResponse(
        $item,
        TransformerAbstract $transformer,
        ?string $resourceKey = null,
        int $status = 200,
        array $headers = []
    ): JsonResponse {
        $resource = new Item($item, $transformer, $resourceKey);

        return $this->buildResourceResponse($resource, $status, $headers);
    }

    /**
     * @param $collection
     * @param TransformerAbstract $transformer
     * @param null|string $resourceKey
     * @param int $status
     * @param array $headers
     * @return JsonResponse
     */
    protected function buildCollectionResponse(
        $collection,
        TransformerAbstract $transformer,
        ?string $resourceKey = null,
        $status = 200,
        array $headers = []
    ): JsonResponse {
        $resource = new Collection($collection, $transformer, $resourceKey);

        return $this->buildResourceResponse($resource, $status, $headers);
    }

    /**
     * @param ResourceAbstract $resource
     * @param int $status
     * @param array $headers
     * @return JsonResponse
     */
    protected function buildResourceResponse(
        ResourceAbstract $resource,
        int $status = 200,
        array $headers = []
    ): JsonResponse {
        $fractal = app(Manager::class);

        return response()->json(
            $fractal->createData($resource)->toArray(),
            $status,
            $headers
        );
    }
}
