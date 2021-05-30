<?php

namespace App\Exceptions;

use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;

/**
 * 自定异常抛出,用于验证表单
 * @return json
 */
class ParamsErrorException extends HttpException{
    public function __construct(string $message = "", int $code = 201, Throwable $previous = null) {
        parent::__construct(200,$message, $previous,[],$code);
    }

    public function render(Request $request) {

        return response()->json(['code' => $this->code , 'msg' => $this->message], $this->code);
    }
}