<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;

    class CacheMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param \Illuminate\Http\Request $request
         * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
         * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
         */
        public function handle($request, Closure $next)
        {
            $response = $next($request);

            $response->header('Cache-Control', 'public, max-age=3600'); // Adjust max-age as needed

            return $response;
        }

    }
