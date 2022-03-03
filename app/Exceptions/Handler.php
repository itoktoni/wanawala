<?php

namespace App\Exceptions;

use Exception;
use Themosis\Core\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * Report or log an exception.
     * 
     * @param \Exception $exception
     */
    public function report(Exception $exception)
    {
        if ($exception) {

            // return response()->view('errors.custom', [
            //     'Error Coy'
            // ], 500);

            // return redirect()->route('home', ['s']);
            // return response()->view('errors.404', [], 404);
        }

        parent::report($exception);
    }
}
