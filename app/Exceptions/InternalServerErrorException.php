<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class InternalServerErrorException extends Exception
{
    public function __construct(
        string $message,
        int $code = Response::HTTP_INTERNAL_SERVER_ERROR,
    ) {
        parent::__construct($message, $code);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'statusCode' => $this->code,
            'message' => $this->message,
            'success' => false,
        ], $this->code);
    }
}
