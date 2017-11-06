<?php namespace App\Http\Middleware;

use App\Song;
use Closure;

/**
 * Class SongGet
 * @package App\Http\Middleware
 */
class SongGet
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $songsIdx = 'songs';
        $knownId  = Song::decode($request->route()->getParameter($songsIdx));
        $request->route()->setParameter($songsIdx, $knownId);

        return $next($request);
    }

}
