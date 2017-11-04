<?php namespace App\Http\Middleware;

use App\Song;
use Closure;

class SongProjection
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
        $song = Song::find($request->route()->getParameter('id'));
        if (is_null($song) || $song->count() <= 0)
        {
            return abort(404);
        }
        else
        {
            $request->route()->setParameter('song', $song);
            $request->route()->forgetParameter('id');

            return $next($request);
        }
    }

}
