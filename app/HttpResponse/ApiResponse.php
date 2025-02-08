<?php

namespace App\HttpResponse;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse
{
    public static function OK($data = null, ?string $message = 'Operación realizada con éxito'): JsonResponse
    {
        $response = [
            'statusCode' => Response::HTTP_OK,
            'message' => $message,
            'success' => true,
            'data' => $data
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public static function Create($data = null, ?string $message = 'Operación realizada con éxito'): JsonResponse
    {
        $response = [
            'statusCode' => Response::HTTP_CREATED,
            'message' => $message,
            'success' => true,
            'data' => $data
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }
}
