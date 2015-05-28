<?php namespace AwCore\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		global $open_post_routes;
		if(is_array($open_post_routes) && count($open_post_routes)){
		   foreach($open_post_routes as $route) {
				if ($request->is($route)) {
					return $next($request);
				}
		   }
		}
		return parent::handle($request, $next);
	}

}
