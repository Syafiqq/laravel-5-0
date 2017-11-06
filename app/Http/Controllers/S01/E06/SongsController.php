<?php namespace App\Http\Controllers\S01\E06;

use App\Http\Controllers\Controller;
use App\Song;
use Illuminate\Http\Request;

/**
 * Class SongsController
 * @package App\Http\Controllers\S01\E06
 */
class SongsController extends Controller
{
    /**
     * @var Song
     */
    private $song;

    /**
     * SongsController constructor.
     * @param Song $song
     */
    public function __construct(Song $song)
    {
        $this->song = $song;
        $this->middleware('song.get', ['only' => ['show', 'edit', 'update', 'destroy']]);
        $this->middleware('song.projection', ['only' => ['show', 'edit', 'update', 'destroy']]);
        $this->middleware('song.push', ['only' => ['index', 'edit']]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return response()->view('layout.s01.e06.songcreate.s01_e06_songcreate_default');
    }

    /**
     * @param Song $song
     * @return \Illuminate\View\View
     */
    public function edit(Song $song)
    {
        return response()->view('layout.s01.e06.songedit.s01_e06_songedit_default', compact('song'));
    }

    /**
     * @param Song $song
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Song $song, Request $request)
    {
        return $this->store($song, $request);
    }

    /**
     * @param Song $song
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Song $song, Request $request)
    {
        $song->setAttribute('song', $request->get('song', null));
        $song->setAttribute('lyric', $request->get('lyric', null));
        if ($song->getAttribute('song') && $song->getAttribute('lyric'))
        {
            $song->save();

            return redirect()->route('s01.e06.songs.index');
        }
        else
        {
            return redirect()->route('s01.e06.songs.create');
        }
    }

    /**
     * @param Song $song
     * @return \Illuminate\View\View
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('s01.e06.songs.index');
    }

    /**
     * @param Song $song
     * @param null|int $id
     * @return \Illuminate\View\View
     */
    private function dispatcher(Song $song, $id = null)
    {
        return is_null($id) ? $this->index() : $this->show($song->find($id));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        /** @var array $songs */
        //$songs = $this->bucket($this->songModel);
        $songs = $this->song->all();

        return response()->view('layout.s01.e06.songlist.s01_e06_songlist_default', compact('songs'));
    }

    /**
     * @param Song $song
     * @return \Illuminate\View\View
     */
    public function show(Song $song)
    {
        return response()->view('layout.s01.e06.songget.s01_e06_songget_default', compact('song'));
    }

    /**
     * @param Song $song
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|null|static|static[]
     */
    private function bucket(Song $song, $id = null)
    {
        return is_null($id) ? $song->all() : $song->find($id);
    }
}
