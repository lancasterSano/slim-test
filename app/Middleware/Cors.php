<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class Cors
{
    public function __invoke(Request $request, Response $response, $next)
    {
        /** @var Response $response */
        $response = $next($request, $response);

        return $response->withHeader('Access-Control-Allow-Origin', getenv('CLIENT_URL'))
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
