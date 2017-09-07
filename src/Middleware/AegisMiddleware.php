<?php

namespace Rewake\Aegis\Middleware;


use Closure;
use Illuminate\Http\Request;

/**
 * Class AegisMiddleware
 *
 * This middleware provides a layer of security for your application, handled by Shield classes which determine the
 * security rules
 */
class AegisMiddleware
{

    /**
     * Create a new middleware instance.
     */
    public function __construct()
    {
        // TODO: load aegis configuration
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // TODO: pass request through shields
    }
}