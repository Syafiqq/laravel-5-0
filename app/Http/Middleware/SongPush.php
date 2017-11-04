<?php namespace App\Http\Middleware;

use App\Song;
use Closure;
use Illuminate\Http\Response;

class SongPush
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
        /** @var Response $response */
        $response = $next($request);
        $content  = $response->getOriginalContent();


        if ($data = $content->getData())
        {
            if (isset($data['songs']))
            {
                /** @var Song $song */
                foreach ($data['songs'] as &$song)
                {
                    if ($song instanceof Song)
                    {
                        $song->setAttribute('id', $song->encode());
                    }
                }
            }
        }

        $response->setContent($content);

        return $response;
    }

}
