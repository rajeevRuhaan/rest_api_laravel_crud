<?php

namespace APP\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait
{
    public function apiException($request, $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Product model not found'
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof NotFoundHttpException) {
            return response()->json([
                'error' => 'Incorrect route'
            ], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $e);
    }
}