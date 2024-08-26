<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof NotFoundHttpException) {
                return response()->json([
                    'error' => 'Página no encontrada',
                    'code' => 404
                ], 404);
            }          

            if ($exception instanceof MethodNotAllowedHttpException) {
                return response()->json([
                    'error' => 'Método no permitido para la solicitud',
                    'code' => 405
                ], 405);
            }

            if ($exception instanceof HttpException) {
                return response()->json([
                    'error' => $exception->getMessage(),
                    'code' => $exception->getStatusCode()
                ], $exception->getStatusCode());
            }

            // Manejo de errores 500
            if ($exception instanceof \Exception) {
                return response()->json([
                    'error' => 'Error interno del servidor',
                    'code' => 500
                ], 500);
            }
        }

        return parent::render($request, $exception);
    }
}
