<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
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
        if($exception instanceof ModelNotFoundException){
            return response()->json(["res" => false, "error" => "Erro de modelo"], status:400);
        }
        if($exception instanceof QueryException){
            return response()->json(["res" => false, "message" => "Erro de consulta no banco de dados", $exception->getMessage()], status:500);
        }
        if($exception instanceof HttpException){
            return response()->json(["res" => false, "error" => "Erro de rota"], status:404);
        }
        if($exception instanceof AuthenticationException){
            return response()->json(["res" => false, "error" => "Erro de autenticacao"], status:401);
        }

        return parent::render($request, $exception);
    }
}
